@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Kehadiran
                </div>
                <a href="{{ route('formidbcs.create') }}" class="btn btn-primary">tambah</a>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Kelas</th>
                                <th>Kehadiran</th>
                                <th>Catatan</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formidbcs as $formidbc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $formidbc->getStudentNameAttribute() }}</td>
                                <td>{{ $formidbc->getGroupNameAttribute() }}</td>
                                <td>{{ $formidbc->presence }}</td>
                                <td>{{ $formidbc->note }}</td>
                                <td>

    <a href="{{ route('formidbcs.edit', $formidbc->id) }}" class="btn btn-success">Ubah</a>
    <form action="{{ route('formidbcs.destroy', $formidbc->id) }}" method="POST" style="display: inline">
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
    </div>
</div>
@endsection

