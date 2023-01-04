<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukModel extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'barang_masuk_id';
    public $timestamps = false;

    public function barang(){
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
