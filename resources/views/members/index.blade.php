@extends('layouts.admin')

@section('content')

<a href="{{ route('members.create') }}" class="btn btn-success">Add member</a>
<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Group ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->student->name }}</td>
            <td>{{ $member->group->name }}</td>
            <td>
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop