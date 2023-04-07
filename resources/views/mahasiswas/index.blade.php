@extends('mahasiswas.layout') 

@section('content') 
    <div class="row"> 
        <div class="col-lg-12 margin-tb text-center"> 
            <div class="pull-left mt-3 mb-4"> 
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>         
            </div> 
            <div class="row justify-content-end mb-2">
                <div class="col-md-6">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" value="{{ (request()->search) ? request()->search : '' }}" name="search" class="form-control" placeholder="Search...">
                            <button class="btn btn-warning" type="submit">Search </button>
                          </div>
                    </form>
                </div>
                <div class="float-right"> 
                    <a class="btn btn-success" href="{{ route('mahasiswas.create') }}">Input Mahasiswa</a> 
                </div> 
            </div>
            
        </div> 
    </div> 

    @if ($message = Session::get('success')) 
        <div class="alert alert-success"> 
            <p>{{ $message }}</p> 
        </div> 
    @endif 

    <table class="table table-bordered"> 
        <tr> 
            <th>Nim</th> 
            <th>Nama</th> 
            <th>Kelas</th> 
            <th>Jurusan</th> 
            <th>No_Handphone</th> 
            <th>email</th> 
            <th>Tanggal Lahir</th> 
            <th width="230px">Action</th> 
        </tr> 
        @foreach ($mahasiswas as $Mahasiswa) 
        <tr> 
            <td>{{ $Mahasiswa->Nim }}</td> 
            <td>{{ $Mahasiswa->Nama }}</td> 
            <td>{{ $Mahasiswa->Kelas }}</td> 
            <td>{{ $Mahasiswa->Jurusan }}</td> 
            <td>{{ $Mahasiswa->No_Handphone }}</td> 
            <td>{{ $Mahasiswa->Email }}</td> 
            <td>{{ $Mahasiswa->TanggalLahir }}</td> 
            <td> 
            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST"> 

                    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>  
                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>  
                    @csrf 
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- {{ $mahasiswas->links() }} --}}
    {{ $mahasiswas->links()}}
@endsection