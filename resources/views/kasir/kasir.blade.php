@extends('layout.mainLayout')

@section('title', 'StokKu | Kasir')

@section('hero')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Kasir
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Transaksi</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Kasir</a>
                        </li>
                    </ol>
                </nav>
            </div> 
        </div>
    </div>
    <!-- END Hero -->
@endsection

@section('content')
    <!-- Page Content -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <!-- Pemilihan barang -->
                <div class="block block-rounded">
                    <div class="block-content p-3">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">ID Transaksi</div>
                        <div class="font-size-h2 text-dark">{{ $invoice }}</div>
                    </div>
                </div>
                <!-- End pemilihan barang -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <!-- Total pembayaran -->
                <div class="block block-rounded">
                    <div class="block-content p-3">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Total</div>
                        <div class="font-size-h2 font-w400 text-dark">Rp {{ $total }}</div>
                    </div>
                </div>
                <!-- End total pembayaran -->
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2">
                <!-- Total pembayaran -->
                <div class="block block-rounded">
                    <div class="block-content p-3">
                        <div class="font-size-sm font-w600 text-uppercase text-muted mb-2">Pembayaran</div>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#pembayaran">
                            Bayar
                        </button>
                    </div>
                </div>
                <!-- End total pembayaran -->
            </div>
        </div>

        <!-- Start tambah barang & jumlah -->
        <div class="block block-rounded">
            <div class="block-content">
                <h5>Pilih barang</h5>

                <!-- Start form pilih barang -->
                <form action="kasir-tambah-cart" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <input type="hidden" class="form-control form-control-alt" name="id" value="">
                            <div class="col-7 col-md-7 col-lg-7 col-xl-7">
                                <div class="form-group">
                                    <select class="form-select form-control form-control-alt" name="barang">
                                        @foreach ($barang as $data)
                                            <option value="{{ $data->barang_id }}">{{ $data->barang_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-3 col-md-3 col-lg-3 col-xl-3">
                                <input type="number" class="form-control form-control-alt" name="jumlah" placeholder="Jumlah barang.." required>
                            </div>

                            <div class="col-2 col-md-2 col-lg-2 col-xl-2">
                                <button type="submit" class="btn btn-primary" name="transasksi_tambah_barang">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End form pilih barang -->
            </div>
        </div>
        <!-- End tambah barang & jumlah -->

        <!-- Daftar barang -->
        <div class="block block-rounded">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" style="width: 10%;">No</th>
                                <th class="text-center" style="width: 20%;">Nama</th>
                                <th class="text-center" style="width: 10%;">Jumlah</th>
                                <th class="text-center" style="width: 10%;">Harga</th>
                                <th class="text-center" style="width: 10%;">Sub total</th>
                                <th class="text-center" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($cart as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->barang->barang_nama }}</td>
                                <td>{{ $data->barang_jumlah }}</td>
                                <td class="text-right">{{ $data->barang->barang_harga_jual }}</td>
                                <td class="text-right">{{ $data->barang_subtotal }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="/kasir-hapus-cart/{{ $data->cart_id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus data">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End daftar barang -->
    <!-- END Page Content -->

    <!-- Start modal pembayaran -->
    <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Proses pembayaran</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        <label class="text-mute">Total belanja</label>
                        <h1 class="text-mute">Rp {{ $total }}</h1>
                        <hr>

                        <form action="/kasir-pembayaran" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $total }}" name='total'>
                            <input type="hidden" value="{{ $invoice }}" name='kodeTransaksi'>

                            <div class="form-group">
                                <label>Jumlah pembayaran</label>
                                <input type="number" class="form-control form-control-alt" name="bayar" placeholder="Jumlah uang pembayaran.." required>
                            </div>

                            <div class="block-content block-content-full text-right border-top">
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>             
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End modal pembayaran -->
@endsection