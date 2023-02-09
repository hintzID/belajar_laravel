@extends('layouts.admin')

@section('content')

<form action="{{ route('members.store') }}" method="post">
    @csrf
    <label for="student_id">Student ID</label>
    <select name="student_id" id="student_id" class="form-control">
        @foreach ($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="group_id">Group ID</label>
    <select name="group_id" id="group_id" class="form-control">
        @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@stop