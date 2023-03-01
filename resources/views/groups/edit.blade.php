@extends('layouts.admin')

@section('content')

<div class="container">
<form action="{{ route('groups.update', $group->id) }}" method="post">
    @csrf
    @method('patch')
    <label for="user_id">User ID</label>
    <select name="user_id" id="user_id" class="form-control" disabled>
        <option value="{{ $group->user_id }}">{{ $group->user->name }}</option>
    </select>
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $group->name }}" class="form-control">
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@stop
