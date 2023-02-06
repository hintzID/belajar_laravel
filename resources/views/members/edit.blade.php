<form action="{{ route('members.update', $member->id) }}" method="post">
    @csrf
    @method('patch')
    <label for="student_id">Student ID</label>
    <select name="student_id" id="student_id">
        @foreach ($students as $student)
            <option value="{{ $student->id }}" {{ $student->id == $member->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="group_id">group ID</label>
    <select name="group_id" id="group_id">
        @foreach ($groups as $group)
            <option value="{{ $group->id }}" {{ $group->id == $member->group_id ? 'selected' : '' }}>{{ $group->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Update</button>
</form>