<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\SuplierModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = BarangModel::all();
        return view('barang.dataBarang', ['barang'=>$barang]);
    }

    public function formTambah(){
        $suplier = SuplierModel::all();
        return view('barang.tambahBarang', ['suplier'=>$suplier]);
    }

    public function tambah(Request $request){
        $dbBarang = new BarangModel;

        $dbBarang->barang_nama = $request->nama;
        $dbBarang->barang_harga_beli = $request->harga_beli;
        $dbBarang->barang_harga_jual = $request->harga_jual;
        $dbBarang->barang_stok = 0;
        $dbBarang->suplier_id = $request->suplier;
        $dbBarang->save();

        return redirect('/barang');
    }

    public function formEdit($id){
        $barang = BarangModel::find($id);
        $suplierPilihan = SuplierModel::where('suplier_id', '!=', $barang->suplier_id)->get(['suplier_nama', 'suplier_id']);
        return view('barang.editBarang', ['barang'=>$barang, 'suplierPilihan'=>$suplierPilihan]);
    }

    public function edit(Request $request, $id){
        $dbBarang = BarangModel::find($id);

        $dbBarang->barang_nama = $request->nama;
        $dbBarang->barang_harga_beli = $request->harga_beli;
        $dbBarang->barang_harga_jual = $request->harga_jual;
        $dbBarang->suplier_id = $request->suplier;
        $dbBarang->save();

        return redirect('/barang');
    }

    public function konfirmHapus($id){
        $barang = BarangModel::find($id);
        return view('barang.hapusBarang', ['barang'=>$barang]);
    }

    public function hapus($id){
        $barang = BarangModel::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
