<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukOwnner extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'ownner_id','nama_produk','deskripsi', 'foto','barcode','harga_beli','harga_jual'
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
