@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Kehadiran
                 <div>                
                    <a href="{{ route('presences.create') }}" class="btn btn-primary col-1">Tambah</a>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Kelas</th>
                                <th>Kehadiran</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presences as $presence)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $presence->student->name }}</td>
                                <td>{{ $presence->schedule->group->name }}</td>
                                <td>{{ $presence->presence }}</td>
                                <td>{{ $presence->note }}</td>
                                <td>
                                <a href="{{ route('presences.edit', $presence->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('presences.destroy', $presence->id) }}" method="post" style="display: inline-block;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                 </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
