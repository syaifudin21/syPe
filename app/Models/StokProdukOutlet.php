<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokProdukOutlet extends Model
{
    protected $fillable = [
        'produk_id','stok_awal','debit','kredit','stok_akhir','invoice','keterangan'
    ];
    protected $casts = [
        'keterangan' => 'array'
    ];

    public function produk(){
        return $this->belongsTo(ProdukOutlet::class, 'produk_id', 'id');
    }
}
