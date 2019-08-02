<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KirimStok extends Model
{
    use SoftDeletes;

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
