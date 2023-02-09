@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Presence</div>

                <div class="card-body">
                    <form action="{{ route('presences.update', $presence->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                        <label for="schedule_id">Schedule ID</label>
                        <select name="schedule_id" class="form-control" required>
                        @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ $presence->schedule_id == $schedule->id ? 'selected' : '' }}>{{ $schedule->group->name }}</option>
                        @endforeach
                       </select>
                       </div>

                       <div class="form-group">
                       <label for="student_id">Student ID</label>
                       <select name="student_id" class="form-control" required>
                        @foreach ($students as $student)
                       <option value="{{ $student->id }}" {{ $presence->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                       @endforeach
                       </select>
                       </div>

                        <div class="form-group">
                            <label for="presence">Presence</label>
                            <select name="presence" class="form-control" required>
                                <option value="hadir" {{ $presence->presence == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ $presence->presence == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ $presence->presence == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ $presence->presence == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" class="form-control">{{ $presence->note }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
