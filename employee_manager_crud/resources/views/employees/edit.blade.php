@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee</h2>
    <form method="POST" action="{{ route('employees.update', $employee) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $employee->date_of_birth }}" required>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="male" @if($employee->gender=='male') selected @endif>Male</option>
                <option value="female" @if($employee->gender=='female') selected @endif>Female</option>
                <option value="other" @if($employee->gender=='other') selected @endif>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Start Work Date</label>
            <input type="date" name="start_work_date" class="form-control" value="{{ $employee->start_work_date }}" required>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" class="form-control" value="{{ $employee->department }}" required>
        </div>
        <div class="mb-3">
            <label>Manager</label>
            <select name="manager_id" class="form-control">
                <option value="">None</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" @if($employee->manager_id==$manager->id) selected @endif>{{ $manager->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
