@extends('layout.mainLayout')

@section('title', 'StokKu | Edit Suplier')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Edit Suplier
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Suplier</li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/suplier">Data</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="">Edit</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<form action="/suplier/{{ $suplier->suplier_id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"></h3>
            <div class="block-options">
                <button type="submit" class="btn btn-sm btn-primary">
                    Ubah
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
                        <label>Nama suplier</label>
                        <input type="text" class="form-control form-control-alt" name="nama" value="{{ $suplier->suplier_nama }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control form-control-alt" name="alamat" value="{{ $suplier->suplier_alamat }}">
                    </div>
                    <div class="form-group">
                        <label>Nomor telepon</label>
                        <input type="text" class="form-control form-control-alt" name="telepon" value="{{ $suplier->suplier_telepon }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection