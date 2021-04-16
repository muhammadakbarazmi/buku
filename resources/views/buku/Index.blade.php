@extends('buku.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Daftar Buku Perpustakaan Media Book Kabupaten Ponorogo</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('buku.create') }}"> Input Buku</a>
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
            <th>id_buku</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($buku as $Buku)
        <tr>
            <td>{{ $Buku->id_buku }}</td>
            <td>{{ $Buku->Judul }}</td>
            <td>{{ $Buku->Kategori }}</td>
            <td>{{ $Buku->Penerbit }}</td>
            <td>{{ $Buku->Pengarang }}</td>
            <td>{{ $Buku->Jumlah }}</td>
            <td>{{ $Buku->Status }}</td>
            <td>
                <form action="{{ route('buku.destroy',$Buku->id_buku) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('buku.show',$Buku->id_buku) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('buku.edit',$Buku->id_buku) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
        {{ $buku->links() }}
@endsection