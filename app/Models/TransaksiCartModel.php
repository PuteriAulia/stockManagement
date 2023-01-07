<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCartModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;

    public function barang(){
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
