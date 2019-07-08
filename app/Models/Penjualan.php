<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'invoice','produk','ownner_id','outlet_id','kasir_id','pelanggan_id','tagihan','status','catatan','produk_refisi', 'tagihan_refisi'
    ];
    protected $casts = [
        'produk' => 'array',
        'produk_refisi' => 'array',
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
    public function ownner(){
        return $this->belongsTo(Ownner::class, 'ownner_id', 'id');
    }
    public function kasir(){
        return $this->belongsTo(Kasir::class, 'kasir_id', 'id');
    }
}
