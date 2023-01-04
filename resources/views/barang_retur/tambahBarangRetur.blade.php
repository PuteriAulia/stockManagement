@extends('layout.mainLayout')

@section('title', 'StokKu | Tambah Barang Retur')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Tambah Barang Retur
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Barang retur</li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/barangRetur">Data</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="">Tambah</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<form action="/barangRetur" method="POST">
    @csrf
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"></h3>
            <div class="block-options">
                <button type="submit" class="btn btn-sm btn-primary">
                    Tambah
                </button>
                <button type="reset" class="btn btn-sm btn-alt-primary">
                    Reset
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-select form-control form-control-alt" name="barang">
                            @foreach ($barang as $data)
                                <option value="{{ $data->barang_id }}">{{ $data->barang_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stok keluar</label>
                        <input type="number" class="form-control form-control-alt" name="jumlah" placeholder="Masukkan stok keluar...">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control form-control-alt" name="tanggal" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection