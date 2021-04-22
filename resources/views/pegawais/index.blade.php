@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pegawais.create') }}"> Add</a>
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
            <th width="20px" class="text-center">No</th>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pegawais as $pegawai)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pegawai->nip }}</td>
            <td>{{ $pegawai->nama_pegawai }}</td>
            <td>{{ $pegawai->alamat }}</td>
            <td class="text-center">
                <form action="{{ route('pegawais.destroy',$pegawai->id) }}" method="POST">

                    <a class="btn btn-primary btn-sm" href="{{ route('pegawais.edit',$pegawai->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $pegawais->links() !!}
 
@endsection