@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Manager</h2>
    <form method="POST" action="{{ route('managers.update', $manager) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $manager->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $manager->email }}" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $manager->date_of_birth }}" required>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="male" @if($manager->gender=='male') selected @endif>Male</option>
                <option value="female" @if($manager->gender=='female') selected @endif>Female</option>
                <option value="other" @if($manager->gender=='other') selected @endif>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Start Work Date</label>
            <input type="date" name="start_work_date" class="form-control" value="{{ $manager->start_work_date }}" required>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" class="form-control" value="{{ $manager->department }}" required>
        </div>
        <div class="mb-3">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="{{ $manager->position }}">
        </div>
        <div class="mb-3">
            <label>Team Size</label>
            <input type="number" name="team_size" class="form-control" value="{{ $manager->team_size }}">
        </div>
        <div class="mb-3">
            <label>Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('managers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
