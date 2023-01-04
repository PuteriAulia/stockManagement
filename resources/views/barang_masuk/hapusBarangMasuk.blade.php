@extends('layout.mainLayout')

@section('title', 'StokKu | Hapus Barang Masuk')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah anda yakin ingin menghapus barang masuk {{ $barangMasuk->barang->barang_nama }} dengan jumlah stok sebanyak {{ $barangMasuk->barang_masuk_jumlah }} ?</p>

            <form style="display: inline-block" action="/barangMasuk-hapus/{{ $barangMasuk->barang_masuk_id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="/barangMasuk"><button type="button" class="btn btn-sm btn-primary">Cancel</button></a>
        </div>
    </div>
@endsection