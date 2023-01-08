<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\SuplierModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $barang = BarangModel::count();
        $suplier = SuplierModel::count();
        $transaksi = TransaksiModel::all();
        return view('dashboard',['barang'=>$barang, 'suplier'=>$suplier, 'transaksi'=>$transaksi]);
    }
}
