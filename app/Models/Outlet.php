<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Outlet extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'ownner_id','nama', 'username', 'password', 'hp', 'alamat'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'keadaan_pra' => 'array',
    ];

    public function ownner(){
        return $this->belongsTo(Ownner::class, 'ownner_id', 'id');
    }
    public function kasir()
    {
        return $this->hasMany(Kasir::class, 'outlet_id', 'id');
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'outlet_id', 'id');
    }
    public function produk()
    {
        return $this->hasMany(ProdukOutlet::class, 'outlet_id', 'id');
    }
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'outlet_id', 'id');
    }
    public function kasirHadir()
    {
        return $this->hasMany(KasirHadir::class, 'outlet_id', 'id');
    }
    public function kirimStok()
    {
        return $this->hasMany(KirimStok::class, 'outlet_id', 'id');
    }
}
