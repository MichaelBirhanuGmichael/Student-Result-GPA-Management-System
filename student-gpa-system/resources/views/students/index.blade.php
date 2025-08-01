@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Student GPA List</h2>

    <form method="GET" action="{{ route('students.index') }}" class="mb-6">
    <div class="mb-4 flex gap-4">
        <a href="{{ route('students.export.excel', ['course_id' => request('course_id')]) }}" class="bg-green-600 text-white px-4 py-2 rounded">Export Excel</a>
        <a href="{{ route('students.export.pdf', ['course_id' => request('course_id')]) }}" class="bg-red-600 text-white px-4 py-2 rounded">Export PDF</a>
    </div>
        <div class="flex items-center gap-4">
            <label for="course_id" class="text-gray-700">Filter by Course:</label>
            <select name="course_id" id="course_id" class="border-gray-300 rounded" onchange="this.form.submit()">
                <option value="">All Courses</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ (isset($courseId) && $courseId == $course->id) ? 'selected' : '' }}>{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <table class="min-w-full divide-y divide-gray-200 border">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">GPA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
            <tr>
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $student->name }}</td>
                <td class="px-4 py-2">{{ $student->gpa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
