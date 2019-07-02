<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ownner extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'username', 'password', 'hp', 'alamat'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
    ];

    public function produk()
    {
        return $this->hasMany(ProdukOwnner::class, 'ownner_id', 'id');
    }
    public function kirimStok()
    {
        return $this->hasMany(KirimStok::class, 'ownner_id', 'id');
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'ownner_id', 'id');
    }
    public function outlet()
    {
        return $this->hasMany(Outlet::class, 'ownner_id', 'id');
    }
}
