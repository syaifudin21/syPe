<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukOutlet;
use App\Models\StokProdukOutlet;

class ProdukController extends Controller
{
    public function produkstore(Request $request)
    {
    	$produk = new ProdukOutlet();
        $produk->fill($request->all());
        $produk->save();
        if ($produk) {
            $data = [
                'message' => 'Berhasil Tambah Produk',
                'produk' => $produk,
	        	'kode' => '00'
	        ];
	     
        } else {
        	$data = [
	        	'message' => 'Gagal Push Produk',
	        	'kode' => '01'
	        ];
        }
        return $data;
        
    }
    public function produkdata(Request $request)
    {
        $produk = ProdukOutlet::withTrashed()->where('outlet_id', $request->outlet_id)->OrderBy('id','DESC')->get();
        if (count($produk) != 0) {
            $data = [
                'produks' => $produk,
                'message' => 'Ada Data',
                'kode'=> '00'
            ];
        } else {
            $data = [
                'data' => $produk,
                'message' => 'Tidak Ada Data',
                'kode'=> '01'
            ];
        }

        return $data;
    }
    public function produkupdate(Request $request)
    {
        $find = ProdukOutlet::find($request->produk_id);
        if (!empty($find)) {
            $find->fill($request->all());
            $find->save();

            if ($find) {
                $data = [
                    'message' => 'Berhasil Update',
                    'produk' => $find,
                    'kode'=> '00'
                ];
            } else {
                $data = [
                    'message' => 'Gagal update Produk',
                    'kode'=> '01'
                ];
            }
        } else {
            $data = [
                'message' => 'ID Produk Tidak ditemukan',
                'kode'=> '02'
            ];
        }
        return $data;
    }
    public function produkdelete(Request $request)
    {
        $find = ProdukOutlet::find($request->produk_id);
        if (!empty($find)) {
            $find->delete();
            if ($find) {
                $data = [
                    'message' => 'Berhasil Delete',
                    'kode'=> '00'
                ];
            } else {
                $data = [
                    'message' => 'Gagal Delete Produk',
                    'kode'=> '01'
                ];
            }
        } else {
            $data = [
                'message' => 'ID Produk Tidak ditemukan',
                'kode'=> '02'
            ];
        }
        return $data;
    }
    public function stokstore(Request $request)
    {
        $produk = ProdukOutlet::find($request->produk_id);
        if ($produk) {
        
            $stokakhir = StokProdukOutlet::where('produk_id', $request->produk_id)->orderBy('id', 'DESC')->first();
            if($stokakhir){
                if ($request->status == 'kredit') {
                    $stok = new StokProdukOutlet();
                    $stok['produk_id'] = $request->produk_id;
                    $stok['stok_awal'] = $stokakhir->stok_akhir;
                    $stok['kredit'] = $request->stok;
                    $stok['stok_akhir'] = $stokakhir->stok_akhir+$request->stok;
                    $stok['invoice'] = $request->invoice;
                    $stok['keterangan'] = $request->keterangan;
                    $stok['created_at'] = $request->created_at;
                    $stok->save();
                    $data = [
                        'status' => $request->status,
                        'stok_akihr' => $stok->stok_akhir,
                        'message' => 'Berhasil Create Stok',
                        'kode' => '00'
                    ];
                
                }else{
                    $stok = new StokProdukOutlet();
                    $stok['produk_id'] = $request->produk_id;
                    $stok['stok_awal'] = $stokakhir->stok_akhir;
                    $stok['debit'] = $request->stok;
                    $stok['stok_akhir'] = $stokakhir->stok_akhir-$request->stok;
                    $stok['invoice'] = $request->invoice;
                    $stok['keterangan'] = $request->keterangan;
                    $stok['created_at'] = $request->created_at;
                    $stok->save();
                    $data = [
                        'stok_akihr' => $stok->stok_akhir,
                        'message' => 'Berhasil Create Stok',
                        'kode' => '00'
                    ];

                }

            }else{
                $stok = new StokProdukOutlet();
                $stok['produk_id'] = $request->produk_id;
                $stok['stok_awal'] = 0;
                $stok['kredit'] = $request->kredit;
                $stok['stok_akhir'] = $request->kredit;
                $stok['invoice'] = $request->invoice;
                $stok['keterangan'] = $request->keterangan;
                $stok['created_at'] = $request->created_at;
                $stok->save();
                $data = [
                    'stok_akihr' => $stok->stok_akhir,
                    'message' => 'Berhasil Create Stok',
                    'kode' => '00'
                ];

            }
        }else{
            $data = [
                'message' => 'Id Prodok tidak sesuai',
                'kode' => '00'
            ];
        }
        
        return $data;
        
    }
    public function stokdata(Request $request)
    {
        $stoks = StokProdukOutlet::withTrashed()->where('produk_id', $request->produk_id)->OrderBy('id','DESC')->get();
        if (count($stoks) != 0) {
            $data = [
                'stok' => $stoks,
                'message' => 'Ada Data',
                'kode'=> '00'
            ];
        } else {
            $data = [
                'message' => 'Tidak Ada Data',
                'kode'=> '01'
            ];
        }

        return $data;
    }
}
