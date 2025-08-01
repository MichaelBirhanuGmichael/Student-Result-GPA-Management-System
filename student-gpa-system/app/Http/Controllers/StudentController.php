<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Helpers\GPAHelper;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('scores')->get()->map(function ($student) {
            $student->gpa = GPAHelper::calculateGPA($student->scores);
            return $student;
        });

        $students = $students->sortByDesc('gpa');

        return view('students.index', compact('students'));
    }
}
