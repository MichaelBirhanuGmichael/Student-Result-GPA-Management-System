<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Score;

class ScoreController extends Controller
{
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('students.create_score', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'score' => 'required|integer|min:0|max:100',
        ]);

        Score::create($validated);

        return redirect()->route('students.index')->with('success', 'Score added successfully!');
    }
}
