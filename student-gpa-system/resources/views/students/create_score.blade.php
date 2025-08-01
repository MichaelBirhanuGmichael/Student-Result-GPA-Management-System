@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded p-6">
    <h2 class="text-xl font-semibold mb-4">Add Score</h2>
    <form method="POST" action="{{ route('scores.store') }}">
        @csrf
        <div class="mb-4">
            <label for="student_id" class="block text-gray-700">Student</label>
            <select name="student_id" id="student_id" class="mt-1 block w-full border-gray-300 rounded">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="course_id" class="block text-gray-700">Course</label>
            <select name="course_id" id="course_id" class="mt-1 block w-full border-gray-300 rounded">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="score" class="block text-gray-700">Score</label>
            <input type="number" name="score" id="score" class="mt-1 block w-full border-gray-300 rounded" min="0" max="100" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Score</button>
    </form>
</div>
@endsection
