@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Managers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Team Size</th>
                <th>Employees</th>
            </tr>
        </thead>
        <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->name }}</td>
                    <td>{{ $manager->email }}</td>
                    <td>{{ $manager->department }}</td>
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Employees</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Manager</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->manager ? $employee->manager->name : 'None' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
