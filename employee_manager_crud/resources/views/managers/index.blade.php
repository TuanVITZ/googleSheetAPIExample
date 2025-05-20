@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Managers</h2>
    <a href="{{ route('managers.create') }}" class="btn btn-success mb-2">Add Manager</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Start Work Date</th>
                <th>Department</th>
                <th>Position</th>
                <th>Team Size</th>
                <th>Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->name }}</td>
                    <td>{{ $manager->email }}</td>
                    <td>{{ $manager->date_of_birth }}</td>
                    <td>{{ $manager->gender }}</td>
                    <td>{{ $manager->start_work_date }}</td>
                    <td>{{ $manager->department }}</td>
                    <td>{{ $manager->position }}</td>
                    <td>{{ $manager->team_size }}</td>
                    <td>
                        @if($manager->employees->count())
                            <ul>
                                @foreach($manager->employees as $employee)
                                    <li>{{ $employee->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No employees</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('managers.edit', $manager) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('managers.destroy', $manager) }}" method="POST" style="display:inline-block;">
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
