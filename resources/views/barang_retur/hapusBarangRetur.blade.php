@extends('layout.mainLayout')

@section('title', 'StokKu | Hapus Barang Retur')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah anda yakin ingin menghapus barang retur {{ $barangRetur->barang->barang_nama }} dengan jumlah stok sebanyak {{ $barangRetur->barang_retur_jumlah }} ?</p>

            <form style="display: inline-block" action="/barangRetur-hapus/{{ $barangRetur->barang_retur_id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="/barangRetur"><button type="button" class="btn btn-sm btn-primary">Cancel</button></a>
        </div>
    </div>
@endsection