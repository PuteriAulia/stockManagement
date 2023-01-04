<?php

namespace App\Http\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        $barangMasuk = BarangMasukModel::all();
        return view('barang_masuk.dataBarangMasuk', ['barangMasuk'=>$barangMasuk]);
    }

    public function formTambah(){
        $barang = BarangModel::all();
        return view('barang_masuk.tambahBarangMasuk', ['barang'=>$barang]);
    }

    public function tambah(Request $request){
        $dbBarangMasuk = new BarangMasukModel;

        // Pengelolaan stok
        $dbBarang = BarangModel::find($request->barang);
        $updateStok = $dbBarang->barang_stok + $request->jumlah;
        // Update stok di dbBarang
        $dbBarang->barang_stok = $updateStok;
        $dbBarang->save();

        // Simpan dbBarangMasuk
        $dbBarangMasuk->barang_id = $request->barang;
        $dbBarangMasuk->barang_masuk_jumlah = $request->jumlah;
        $dbBarangMasuk->barang_masuk_tanggal = $request->tanggal;
        $dbBarangMasuk->save();

        return redirect('/barangMasuk');
    }

    public function konfirmHapus($id){
        $barangMasuk = BarangMasukModel::find($id);
        // $barang = BarangModel::where('barang_id', '==', $barangMasuk->barang_masuk_id)->get('barang_nama');
        // return view('barang_masuk.hapusBarangMasuk', ['barangMasuk'=>$barangMasuk, 'barang'=>$barang]);
        return view('barang_masuk.hapusBarangMasuk', ['barangMasuk'=>$barangMasuk]);
    }

    public function hapus($id){
        // Menghapus data barang masuk
        $barangMasuk = BarangMasukModel::find($id);
        $barangMasuk->delete();
        
        // Update stok di dbBarang (mengurangi)
        $barang = BarangModel::find($barangMasuk->barang_id);
        $updateStok = $barang->barang_stok - $barangMasuk->barang_masuk_jumlah;
        $barang->barang_stok = $updateStok;
        $barang->save();
        
        return redirect('/barangMasuk');
    }
}
