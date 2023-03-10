
@extends('layouts.admin')

@section('content')

@section('title', 'Data Murid')

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">Insert Student</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NUMBER</th>
                                <th scope="col">NAME</th>
                                <th scope="col">PHOTO</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">PHONE</th>
                                <th scope="col">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->number }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td class="text-center" style="width: 50px">
                                        <img src="{{ Storage::url('public/students/').$student->image }}" class="rounded" style="width:100%;">
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                     NO DATA
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>

@stop