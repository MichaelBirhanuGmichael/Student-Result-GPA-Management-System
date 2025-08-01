<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Helpers\GPAHelper;

class StudentController extends Controller
{
    public function exportExcel(Request $request)
    {
        $courseId = $request->input('course_id');
        $studentsQuery = Student::with(['scores' => function ($query) use ($courseId) {
            if ($courseId) {
                $query->where('course_id', $courseId);
            }
        }]);
        $students = $studentsQuery->get()->map(function ($student) {
            $student->gpa = GPAHelper::calculateGPA($student->scores);
            return $student;
        });

        $exportData = $students->map(function ($student, $index) {
            return [
                '#' => $index + 1,
                'Name' => $student->name,
                'GPA' => $student->gpa,
            ];
        });

        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\StudentsExport($exportData), 'students_gpa.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $courseId = $request->input('course_id');
        $studentsQuery = Student::with(['scores' => function ($query) use ($courseId) {
            if ($courseId) {
                $query->where('course_id', $courseId);
            }
        }]);
        $students = $studentsQuery->get()->map(function ($student) {
            $student->gpa = GPAHelper::calculateGPA($student->scores);
            return $student;
        });

        $pdf = \Barryvdh\DomPDF\Facades\Pdf::loadView('students.pdf', ['students' => $students]);
        return $pdf->download('students_gpa.pdf');
    }

    public function index(Request $request)
    {
        $courseId = $request->input('course_id');
        $courses = \App\Models\Course::all();

        $studentsQuery = Student::with(['scores' => function ($query) use ($courseId) {
            if ($courseId) {
                $query->where('course_id', $courseId);
            }
        }]);
        $students = $studentsQuery->get()->map(function ($student) {
            $student->gpa = GPAHelper::calculateGPA($student->scores);
            return $student;
        });

        $students = $students->sortByDesc('gpa');

        return view('students.index', compact('students', 'courses', 'courseId'));
    }
}
