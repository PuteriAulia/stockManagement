@extends('layout.mainLayout')

@section('title', 'StokKu | Tambah Suplier')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Tambah Suplier
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Suplier</li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/suplier">Data</a>
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
<form action="/suplier" method="POST">
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
                        <label for="block-form1-username">Nama suplier</label>
                        <input type="text" class="form-control form-control-alt" name="nama" placeholder="Masukkan nama suplier..." required>
                    </div>
                </div>
                <div class="col-sm-10 col-md-8">
                    <div class="form-group">
                        <label for="block-form1-username">Alamat</label>
                        <input type="text" class="form-control form-control-alt" name="alamat" placeholder="Masukkan alamat..." required>
                    </div>
                </div>
                <div class="col-sm-10 col-md-8">
                    <div class="form-group">
                        <label for="block-form1-username">Nomor telepon</label>
                        <input type="text" class="form-control form-control-alt" name="telepon" placeholder="Masukkan nomor telepon..." required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection