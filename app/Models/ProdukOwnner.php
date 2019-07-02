<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukOwnner extends Model
{
    protected $fillable = [
        'ownner_id','nama_produk','deskripsi','barcode','harga_beli','harga_jual'
    ];
    protected $casts = [
        'keadaan_pra' => 'array',
    ];

    public function ownner(){
        return $this->belongsTo(Ownner::class, 'ownner_id', 'id');
    }
    public function stok()
    {
        return $this->hasMany(StokProdukOwnner::class, 'produk_id', 'id');
    }
}
