<form action="{{ route('groups.update', $group->id) }}" method="post">
    @csrf
    @method('patch')
    <label for="user_id">User ID</label>
    <select name="user_id" id="user_id">
        @foreach (App\Models\User::all() as $user)
            <option value="{{ $user->id }}" {{ $user->id == $group->user_id ? 'selected' : '' }}>{{ $user->id }}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $group->name }}">
    <br>
    <button type="submit">Update</button>
</form>
