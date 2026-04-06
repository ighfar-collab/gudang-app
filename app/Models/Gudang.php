<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudangs';

    protected $fillable = [
        'nama_gudang',
        'lokasi'
    ];

    // ================= RELASI =================

    // Mutasi keluar (barang dari gudang ini)
    public function mutasiKeluar()
    {
        return $this->hasMany(Mutasi::class, 'dari_gudang');
    }

    // Mutasi masuk (barang ke gudang ini)
    public function mutasiMasuk()
    {
        return $this->hasMany(Mutasi::class, 'ke_gudang');
    }
}