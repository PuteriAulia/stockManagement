<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = false;

    public function suplier(){
        return $this->belongsTo(SuplierModel::class, 'suplier_id', 'suplier_id');
    }

    public function barangMasuk(){
        return $this->belongsTo(BarangMasukModel::class, 'barang_id', 'barang_id');
    }
}
