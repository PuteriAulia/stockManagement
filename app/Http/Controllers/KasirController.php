<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiCartModel;
use App\Models\TransaksiDetailModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(){
        $barang = BarangModel::all();
        $cart = TransaksiCartModel::all();

        // Kelola total
        $total = 0;
        foreach ($cart as $data) {
            $total = $total + $data->barang_subtotal;
        }

        // Invoice
        $kodeTerbesar = TransaksiModel::max('transaksi_id');
        $tanggalKode = (int) substr($kodeTerbesar,-10,6);
        $urutanKode = (int) substr($kodeTerbesar,-4,4);
        $tanggal = date('ymd');

        if ($tanggalKode == $tanggal) {
            $penambahan = $urutanKode+1;
            $urutanKode = sprintf("%'.04d", $penambahan);
        }else{
            $urutanKode = "0001";
        }

        $invoice = "INV".date('ymd').$urutanKode;

        return view('kasir.kasir', ['barang'=>$barang, 'cart'=>$cart, 'total'=>$total, 'invoice'=>$invoice]);
    }

    public function tambahCart(Request $request){
        // Kelola subtotal
        $barang = BarangModel::find($request->barang);
        $subtotal = $barang->barang_harga_jual*$request->jumlah;

        $dbCart = new TransaksiCartModel;
        $dbCart->barang_jumlah = $request->jumlah;
        $dbCart->barang_subtotal = $subtotal;
        $dbCart->barang_id = $request->barang;
        $dbCart->save();

        return redirect('/kasir');
    }

    public function hapus($id){
        $cart = TransaksiCartModel::find($id);
        $cart->delete();
        return redirect('/kasir');
    }

    public function pembayaran(Request $request){
        $invoice = $request->kodeTransaksi;
        $total = $request->total;
        $dbCart = TransaksiCartModel::all();
        $bayar = $request->bayar;
        $kembalian = $bayar - $total;

        return view('kasir.pembayaran', [
            'invoice'=>$invoice,
            'total'=>$total,
            'cart'=>$dbCart,
            'bayar'=>$bayar,
            'kembalian'=>$kembalian,
        ]);
    }

    public function simpan(Request $request){
        $dbCart = TransaksiCartModel::all();

        // Menyimpan ke db transaksi detail
        $dbTransaksiDetail = new TransaksiDetailModel;
        foreach ($dbCart as $data) {
            $dbTransaksiDetail->transaksi_detail_jumlah = $data->barang_jumlah;
            $dbTransaksiDetail->transaksi_detail_subtotal = $data->barang_subtotal;
            $dbTransaksiDetail->transaksi_id = $request->kodeTransaksi;
            $dbTransaksiDetail->barang_id = $data->barang_id;
            $dbTransaksiDetail->save();
        }

        // Menyimpan ke db transaksi
        $dbTransaksi = new TransaksiModel;
        $dbTransaksi->transaksi_id = $request->kodeTransaksi;
        $dbTransaksi->transaksi_total = $request->total;
        $dbTransaksi->transaksi_tanggal = $request->tanggal;
        $dbTransaksi->save();

        TransaksiCartModel::truncate();

        return redirect('/');
    }
}
