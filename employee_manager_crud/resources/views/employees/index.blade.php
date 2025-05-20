@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employees</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-2">Add Employee</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Start Work Date</th>
                <th>Department</th>
                <th>Manager</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->start_work_date }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->manager ? $employee->manager->name : 'None' }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
