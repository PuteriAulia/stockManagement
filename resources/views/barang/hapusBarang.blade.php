@extends('layout.mainLayout')

@section('title', 'StokKu | Hapus Barang')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah anda yakin ingin menghapus barang {{ $barang->barang_nama }} ?</p>

            <form style="display: inline-block" action="/barang-hapus/{{ $barang->barang_id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="/barang"><button type="button" class="btn btn-sm btn-primary">Cancel</button></a>
        </div>
    </div>
@endsection