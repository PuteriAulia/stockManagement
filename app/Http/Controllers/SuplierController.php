<?php

namespace App\Http\Controllers;

use App\Models\SuplierModel;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(){
        $suplier = SuplierModel::where('suplier_status', '=', 'aktif')->get();
        return view('suplier.dataSuplier', ['suplier'=>$suplier]);
    }

    public function formTambah(){
        return view('suplier.tambahSuplier');
    }

    public function tambah(Request $request){
        $dbSuplier = new SuplierModel;

        $dbSuplier->suplier_nama = $request->nama;
        $dbSuplier->suplier_alamat = $request->alamat;
        $dbSuplier->suplier_telepon = $request->telepon;
        $dbSuplier->suplier_status = 'aktif';
        $dbSuplier->save();
        return redirect('/suplier');
    }

    public function formEdit($id){
        $suplier = SuplierModel::find($id);
        return view('suplier.editSuplier', ['suplier'=>$suplier]);
    }

    public function edit(Request $request, $id){
        $dbSuplier = SuplierModel::find($id);

        $dbSuplier->suplier_nama = $request->nama;
        $dbSuplier->suplier_alamat = $request->alamat;
        $dbSuplier->suplier_telepon = $request->telepon;
        $dbSuplier->save();
        return redirect('/suplier');
    }

    public function konfirmHapus($id){
        $suplier = SuplierModel::find($id);
        return view('suplier.hapusSuplier', ['suplier'=>$suplier]);
    }

    public function hapus($id){
        $suplier = SuplierModel::find($id);
        $suplier->suplier_status = 'non-aktif';
        $suplier->save();
        return redirect('/suplier');
    }
}
