<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasirHadir extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kasir_id','outlet_id','waktu_in','waktu_out'
    ];
    protected $casts = [
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
    public function kasir(){
        return $this->belongsTo(Kasir::class, 'kasir_id', 'id');
    }
}
