<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Helpers\GPAHelper;

class StudentController extends Controller
{
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
