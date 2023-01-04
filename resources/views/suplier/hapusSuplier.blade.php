@extends('layout.mainLayout')

@section('title', 'StokKu | Hapus Suplier')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah anda yakin ingin menghapus suplier {{ $suplier->suplier_nama }} ?</p>

            <form style="display: inline-block" action="/suplier-hapus/{{ $suplier->suplier_id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="/suplier"><button type="button" class="btn btn-sm btn-primary">Cancel</button></a>
        </div>
    </div>
@endsection