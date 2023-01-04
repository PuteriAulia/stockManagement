@extends('layout.mainLayout')

@section('title', 'StokKu | Tambah Barang')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Tambah Barang
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Barang</li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/barang">Data</a>
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
<form action="/barang" method="POST">
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
                        <label>Nama barang</label>
                        <input type="text" class="form-control form-control-alt" name="nama" placeholder="Masukkan nama barang...">
                    </div>
                    <div class="form-group">
                        <label>Harag beli</label>
                        <input type="text" class="form-control form-control-alt" name="harga_beli" placeholder="Masukkan harga beli...">
                    </div>
                    <div class="form-group">
                        <label>Harga jual</label>
                        <input type="text" class="form-control form-control-alt" name="harga_jual" placeholder="Masukkan harga jual...">
                    </div>
                    <div class="form-group">
                        <label>Suplier</label>
                        <select class="form-select form-control form-control-alt" name="suplier">
                            @foreach ($suplier as $data)
                                <option value="{{ $data->suplier_id }}">{{ $data->suplier_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection