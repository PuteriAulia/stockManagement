<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiDetailModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_detail';
    protected $primaryKey = 'transaksi_detail_id';
    public $timestamps = false;

    public function transaksi(){ 
        return $this->belongsTo(TransaksiModel::class, 'transaksi_inv', 'transaksi_inv');
    }

    public function barang(){ 
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
