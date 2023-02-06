@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Daftar Jadwal</h1>
            <a href="{{ route('schedules.create') }}" class="btn btn-primary">Tambah</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Grup</th>
                        <th>Pengguna</th>
                        <th>Catatan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->group->name }}</td>
                        <td>{{ $schedule->user->name }}</td>
                        <td>{{ $schedule->note }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
