<table>
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
                <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('members.create') }}">Add member</a>
