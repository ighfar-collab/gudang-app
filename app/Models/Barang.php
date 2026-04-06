<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
    'kode_barang',
    'nama_barang',
    'satuan',
    'stok_minimum'
];

public function mutasis()
{
    return $this->hasMany(Mutasi::class);
}
}
