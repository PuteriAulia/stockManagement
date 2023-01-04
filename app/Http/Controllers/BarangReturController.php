<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\BarangReturModel;

class BarangReturController extends Controller
{
    public function index(){
        $dbBarangRetur = BarangReturModel::all();
        return view('barang_retur.dataBarangRetur', ['barangRetur'=>$dbBarangRetur]);
    }

    public function formTambah(){
        $barang = BarangModel::all();
        return view('barang_retur.tambahBarangRetur', ['barang'=>$barang]);
    }

    public function tambah(Request $request){
        $dbBarangRetur = new BarangReturModel;

        // Pengelolaan stok
        $dbBarang = BarangModel::find($request->barang);
        $updateStok = $dbBarang->barang_stok - $request->jumlah;
        // Update stok di dbBarang
        $dbBarang->barang_stok = $updateStok;
        $dbBarang->save();

        // Simpan dbBarangRetur
        $dbBarangRetur->barang_id = $request->barang;
        $dbBarangRetur->barang_retur_jumlah = $request->jumlah;
        $dbBarangRetur->barang_retur_tanggal = $request->tanggal;
        $dbBarangRetur->save();

        return redirect('/barangRetur');
    }

    public function konfirmHapus($id){
        $dbBarangRetur = BarangReturModel::find($id);
        return view('barang_retur.hapusBarangRetur', ['barangRetur'=>$dbBarangRetur]);
    }

    public function hapus($id){
        // Menghapus data barang retur
        $barangRetur = BarangReturModel::find($id);
        $barangRetur->delete();
        
        // Update stok di dbBarang (mengurangi)
        $barang = BarangModel::find($barangRetur->barang_id);
        $updateStok = $barang->barang_stok + $barangRetur->barang_retur_jumlah;
        $barang->barang_stok = $updateStok;
        $barang->save();
        
        return redirect('/barangRetur');
    }
}
