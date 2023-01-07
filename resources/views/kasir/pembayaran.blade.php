@extends('layout.mainLayout')

@section('title', 'StokKu | Detail Transaksi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 col-xl-7">
        <div class="block block-rounded block-themed">
            <div class="block-header bg-modern">
                <h3 class="block-title">PEMBAYARAN</h3>
            </div>
            <div class="block-content">
                <p class="text-muted">{{ $invoice }}</p>
                <h3>TOTAL : Rp {{ $total }}</h3>
                <hr>

                <p class="text-muted">Detail Pembelian</p>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th class="text-muted">Nama barang</th>
                            <th class="text-muted">Qty</th>
                            <th class="text-muted">Sub total</th>
                        </tr>
                       @foreach ($cart as $data)
                        <tr>
                            <td class="text-muted" style="width: 70%;">{{ $data->barang->barang_nama }}</td>
                            <td class="text-muted" style="width: 10%;">{{ $data->barang_jumlah }}</td>
                            <td class="text-muted text-right" style="width: 20%;">{{ $data->barang_subtotal }}</td>
                        </tr>
                       @endforeach
                    </table>
                </div>
                <hr>
                <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 80%;"><h4 class="text-muted">Total transaksi</h4></td>
                        <td class="text-muted text-right" style="width: 20%;">{{ $total }}</td>
                    </tr>
                </table>

                <hr>
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 80%;" class="text-muted">Bayar</td>
                        <td class="text-muted text-right" style="width: 20%;">Rp {{ $bayar }}</td>
                    </tr>
                    <tr>
                        <td style="width: 80%;" class="text-muted"><b>Total</b></td>
                        <td class="text-muted text-right" style="width: 20%;"><b>Rp {{ $total }}</b></td>
                    </tr>
                    <td style="width: 80%;" class="text-muted">Kembalian</td>
                        <td class="text-muted text-right" style="width: 20%;">Rp {{ $kembalian }}</td>
                    </tr>
                </table>
                
                <form action="/kasir-simpan" method="POST">
                    @csrf
                    <input type="hidden" name="kodeTransaksi" value="{{ $invoice }}">
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                    <button type="submit" class="btn btn-success mb-4">
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection