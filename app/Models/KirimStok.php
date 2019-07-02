<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KirimStok extends Model
{
   protected $fillable = [
        'ownner_id','outlet_id','produk','tagihan','status','keterangan'
    ];
    protected $hidden = [
    ];
    protected $casts = [
        'produk' => 'array',
        'keterangan' => 'array',
    ];

    public function ownner(){
        return $this->belongsTo(Ownner::class, 'ownner_id', 'id');
    }
    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
}
