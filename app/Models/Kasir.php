<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'outlet_id','nama', 'username', 'password', 'hp', 'alamat', 'foto', 'ktp'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
    ];
    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'kasir_id', 'id');
    }
    public function kasirhadir()
    {
        return $this->hasMany(KasirHadir::class, 'kasir_id', 'id');
    }
}
