@extends('layout.mainLayout')

@section('title', 'StokKu | Data Suplier')

@section('hero')
<div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill h3 my-2">
            Daftar Suplier
        </h1>
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">Suplier</li>
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
                    <a href="/suplier-tambah"><button class="btn btn-primary mt-3">Tambah data</button></a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 25%;">Nama Suplier</th>
                            <th class="text-center" style="width: 30%;">Alamat</th>
                            <th class="text-center" style="width: 20%;">No Telepon</th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($suplier as $data)
                        <tr>
                            <td class="text-center" scope="row">{{ $no++ }}</td>
                            <td>
                                <p><b>{{ $data->suplier_nama }}</b></p>
                            </td>
                            <td>
                                <p>{{ $data->suplier_alamat }}</p>
                            </td>
                            <td>
                                <p>{{ $data->suplier_telepon }}</p>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/suplier-edit/{{ $data->suplier_id }}"><button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Suplier">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button></a>
                                    <a href="/suplier-hapus/{{ $data->suplier_id }}"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Suplier">
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