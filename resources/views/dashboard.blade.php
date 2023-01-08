@extends('layout.mainLayout')

@section('title', 'StokKu | Beranda')

@section('content')
    <!-- Overview -->
    <div class="row row-deck">
        <div class="col-sm-6 col-xl-6">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700">{{ $barang }}</dt>
                        <dd class="text-muted mb-0">Jumlah barang</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-shopping-bag font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <a class="font-w500 d-flex align-items-center" href="/barang">
                        Daftar barang
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-6 col-xl-6">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700">{{ $suplier }}</dt>
                        <dd class="text-muted mb-0">Jumlah suplier</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-user font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <a class="font-w500 d-flex align-items-center" href="/suplier">
                        Daftar suplier
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a>
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
    </div>
    <!-- END Overview -->

    {{-- Transaksi --}}
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data Transaksi</h3>
        </div>
        <div class="block-content">
            <!-- Recent Orders Table -->
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">No</th>
                            <th class="text-center" style="width: 30%;">Invoice</th>
                            <th class="text-center" style="width: 30%;">Tanggal</th>
                            <th class="text-center" style="width: 30%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($transaksi as $data)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $data->transaksi_inv }}</td>
                            <td class="text-center">{{ $data->transaksi_tanggal }}</td>
                            <td class="text-center">{{ $data->transaksi_total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END Recent Orders Table -->
        </div>
    </div>
    {{-- End Transaksi --}}
@endsection