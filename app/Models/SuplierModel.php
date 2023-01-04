<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplierModel extends Model
{
    use HasFactory;

    protected $table = 'suplier';
    protected $primaryKey = 'suplier_id';
    public $timestamps = false;

    public function barang(){
        return $this->hasMany(BarangModel::class, 'suplier_id', 'suplier_id');
    }
}
