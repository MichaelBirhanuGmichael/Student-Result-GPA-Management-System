@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Student GPA List</h2>

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
