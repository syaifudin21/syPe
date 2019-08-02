<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukOutlet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'outlet_id','nama_produk','deskripsi', 'foto' ,'barcode', 'harga_beli','harga_jual'
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
