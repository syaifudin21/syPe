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
	        	'message' => 'Berhasil Creaet Produk',
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
}
