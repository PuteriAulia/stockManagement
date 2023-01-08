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
        $barang = BarangModel::where([
            ['barang_status', '=', 'aktif'],
            ['barang_stok', '>', 0]
        ])->get();
        $cart = TransaksiCartModel::all();

        // Kelola total
        $total = 0;
        foreach ($cart as $data) {
            $total = $total + $data->barang_subtotal;
        }

        // Invoice
        $kodeTerbesar = TransaksiModel::max('transaksi_inv');
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
        
        $countCart = TransaksiCartModel::where('barang_id', '=', $request->barang)->count();
        if ($countCart == 0) {
            $barang = BarangModel::find($request->barang);
            $subtotal = $barang->barang_harga_jual*$request->jumlah;

            $dbCart = new TransaksiCartModel;
            $dbCart->barang_jumlah = $request->jumlah;
            $dbCart->barang_subtotal = $subtotal;
            $dbCart->barang_id = $request->barang;
            $dbCart->save();
        }else{
            $cart = TransaksiCartModel::where('barang_id', '=', $request->barang)->get();
            foreach ($cart as $data) {
                $jumlahBaru = $data->barang_jumlah + $request->jumlah;

                $barang = BarangModel::find($request->barang);
                $subtotal = $barang->barang_harga_jual*$jumlahBaru;

                $data->barang_jumlah = $jumlahBaru;
                $data->barang_subtotal = $subtotal;
                $data->save();
            }
        }
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
        
        foreach ($dbCart as $data) {
            // Update stok barang
            $barang = BarangModel::find($data->barang_id);
            $stokBaru = $barang->barang_stok - $data->barang_jumlah;

            $barang->barang_stok = $stokBaru;
            $barang->save();

            // Menyimpan ke db transaksi detail
            $dbTransaksiDetail = new TransaksiDetailModel;
            $dbTransaksiDetail->transaksi_detail_jumlah = $data->barang_jumlah;
            $dbTransaksiDetail->transaksi_detail_subtotal = $data->barang_subtotal;
            $dbTransaksiDetail->transaksi_inv = $request->kodeTransaksi;
            $dbTransaksiDetail->barang_id = $data->barang_id;
            $dbTransaksiDetail->save();
        }

        // Menyimpan ke db transaksi
        $dbTransaksi = new TransaksiModel;
        $dbTransaksi->transaksi_inv = $request->kodeTransaksi;
        $dbTransaksi->transaksi_total = $request->total;
        $dbTransaksi->transaksi_tanggal = $request->tanggal;
        $dbTransaksi->save();

        TransaksiCartModel::truncate();

        return redirect('/');
    }
}
