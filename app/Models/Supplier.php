<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
    
        'nama',
        'kontak',
    
    ];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }


public function loans()
{
    return $this->hasMany(Loan::class);
}
}