@extends('buku.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Buku
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>id_buku: </b>{{$Buku->id_buku}}</li>
                    <li class="list-group-item"><b>Judul: </b>{{$Buku->Judul}}</li>
                    <li class="list-group-item"><b>Kategori: </b>{{$Buku->Kategori}}</li>
                    <li class="list-group-item"><b>Penerbit: </b>{{$Buku->Penerbit}}</li>
                    <li class="list-group-item"><b>Pengarang: </b>{{$Buku->Pengarang}}</li>
                    <li class="list-group-item"><b>Jumlah: </b>{{$Buku->Jumlah}}</li>
                    <li class="list-group-item"><b>Status: </b>{{$Buku->Status}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('buku.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection