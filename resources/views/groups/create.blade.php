@extends('layouts.admin')

@section('content')

<div class="container">
<form action="{{ route('groups.store') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <label for="user_id">User ID</label>
    <select name="user_id" id="user_id" class="form-control" disabled>
        <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
    </select>
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control">
    <br>
    <button type="submit" class="btn btn-success">Create</button>
</form>
</div>
@stop


