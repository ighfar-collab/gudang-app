<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasis';

    protected $fillable = [
        'barang_id',
        'dari_gudang',
        'ke_gudang',
        'jumlah',
        'tipe',
        'tanggal'
    ];

    // ================= RELASI =================

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Gudang asal
    public function gudangAsal()
    {
        return $this->belongsTo(Gudang::class, 'dari_gudang');
    }

    // Gudang tujuan
    public function gudangTujuan()
    {
        return $this->belongsTo(Gudang::class, 'ke_gudang');
    }
}