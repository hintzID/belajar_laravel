@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Data Formulir IDBC
                </div>
                <div class="card-body">
                    <form action="{{ route('formidbcs.store') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Murid</th>
                                    <th>Kelas</th>
                                    <th>Kehadiran</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->student->name }}</td>
                                    <td>{{ $member->group->name }}</td>
                                    <td>
    <div class="form-group">
        <input type="radio" name="presence[{{ $member->id }}]" value="hadir" checked> Hadir &nbsp;
        <input type="radio" name="presence[{{ $member->id }}]" value="sakit"> Sakit &nbsp;
        <input type="radio" name="presence[{{ $member->id }}]" value="alpha"> Alpha &nbsp;
        <input type="radio" name="presence[{{ $member->id }}]" value="izin"> Izin &nbsp;
    </div>
</td>
<td>
    <div class="form-group">
        <textarea name="note[{{ $member->id }}]" class="form-control"></textarea>
    </div>
</td>
<td>
    <div class="form-group">
        <textarea name="note[{{ $member->id }}]" class="form-control"></textarea>
    </div>
</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
