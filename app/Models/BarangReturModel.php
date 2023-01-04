<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangReturModel extends Model
{
    use HasFactory;

    protected $table = 'barang_retur';
    protected $primaryKey = 'barang_retur_id';
    public $timestamps = false;

    public function barang(){
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
