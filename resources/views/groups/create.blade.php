@extends('layouts.admin')

@section('content')


<form action="{{ route('groups.store') }}" method="post">
    @csrf
    <label for="user_id">User ID</label>
    <select name="user_id" id="user_id">
        @foreach (App\Models\User::all() as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <button type="submit">Create</button>
</form>
@stop

