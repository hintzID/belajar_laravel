<div class="card-body">
                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="group_id">Group</label>
                        <select name="group_id" id="group_id" class="form-control">
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ old('group_id', $schedule->group_id) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $schedule->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control">{{ old('note', $schedule->note) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $schedule->start_time) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $schedule->end_time) }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
