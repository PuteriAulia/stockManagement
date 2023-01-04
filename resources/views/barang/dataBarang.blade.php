@extends('layout.mainLayout')

@section('title', 'StokKu | Data Barang')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Daftar Barang
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Barang</li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="">Data</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
    <!-- Hover Table -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3></h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="/barang-tambah"><button class="btn btn-primary mt-3">Tambah data</button></a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center" style="width: 15%;">Harga Beli</th>
                            <th class="text-center" style="width: 15%;">Harga Jual</th>
                            <th class="text-center" style="width: 15%;">Stok</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($barang as $data)
                        <tr>
                            <td class="text-center" scope="row">{{ $no++ }}</td>
                            <td>
                                <p><b>{{ $data->barang_nama }}</b></p>
                            </td>
                            <td class="">
                                <p>{{ $data->barang_harga_beli }}</p>
                            </td>
                            <td class="">
                                <p>{{ $data->barang_harga_jual }}</p>
                            </td>
                            <td class="">
                                <p>{{ $data->barang_stok }}</p>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/barang-edit/{{ $data->barang_id }}"><button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Barang">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button></a>
                                    <a href="/barang-hapus/{{ $data->barang_id }}"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Barang">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Hover Table -->
@endsection