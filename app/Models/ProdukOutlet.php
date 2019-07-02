<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukOutlet extends Model
{
    protected $fillable = [
        'outlet_id','nama_produk','deskripsi','barcode', 'harga_beli','harga_jual'
    ];
    protected $casts = [
        'keadaan_pra' => 'array',
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
    public function stok()
    {
        return $this->hasMany(StokProdukOutlet::class, 'produk_id', 'id');
    }
}
