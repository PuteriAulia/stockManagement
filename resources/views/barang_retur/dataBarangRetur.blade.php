@extends('layout.mainLayout')

@section('title', 'StokKu | Data Barang Retur')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Daftar Barang Retur
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"> Barang retur</li>
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
                    <a href="/barangRetur-tambah"><button class="btn btn-primary mt-3">Tambah data</button></a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">No</th>
                            <th class="text-center" style="width: 20%;">Nama Barang</th>
                            <th class="text-center" style="width: 20%;">Stok keluar</th>
                            <th class="text-center" style="width: 30%;">Tanggal</th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($barangRetur as $data)
                        <tr>
                            <td class="text-center" scope="row">{{ $no++ }}</td>
                            <td>
                                <p>{{ $data->barang->barang_nama }}</p>
                            </td>
                            <td>
                                <p>{{ $data->barang_retur_jumlah }}</p>
                            </td>
                            <td>
                                <p>{{ $data->barang_retur_tanggal }}</p>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/barangRetur-hapus/{{ $data->barang_retur_id }}"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Barang">
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