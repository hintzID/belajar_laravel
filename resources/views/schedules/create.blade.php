@extends('layouts.admin')

@section('content')

<form action="{{ route('schedules.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="group_id">Group ID</label>
    <select name="group_id" id="group_id" class="form-control">
      @foreach ($groups as $group)
        <option value="{{ $group->id }}">{{ $group->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
  <label for="user_id">User ID</label>
    <select name="user_id" id="user_id">
        @foreach (App\Models\User::all() as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="note">Note</label>
    <textarea name="note" id="note" class="form-control" rows="5"></textarea>
  </div>
  <div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="time" name="start_time" id="start_time" class="form-control">
  </div>
  <div class="form-group">
    <label for="end_time">End Time</label>
    <input type="time" name="end_time" id="end_time" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@stop