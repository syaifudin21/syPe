<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukOutlet;
use App\Models\StokProdukOutlet;

class ProdukController extends Controller
{
    public function pushProduk(Request $request)
    {
    	$produk = new ProdukOutlet();
        $produk->fill($request->all());
        $produk['created_at'] = $request->time_produk;
        $produk['updated_at'] = Carbon::now();
        $produk->save();
        if ($produk) {
        	$stok = new StokProdukOutlet();
	        $stok['outlet_id'] = $request->outlet_id;
	        $stok['produk_id'] = $produk->id;
	        $stok['kredit'] = $request->stok_awal;
	        $stok['stok_akhir'] = $request->stok_awal;
	        $stok['waktu'] = $request->time_stok;
	        $stok->save();
	        if ($stok) {
	        	$data = [
	        	 	'produk_id' => $produk->id,
	        	 	'nomor_produk' => $request->nomor_produk,
	        	 	'time_produk' => $produk->updated_at,
		        	'message' => 'Berhasil Push Produk & Stok',
		        	'kode' => '00'
		        ];
	        } else {
	        	$data = [
	        	 	'produk_id' => $produk->id,
		        	'message' => 'Berhasil Push Produk Gagal Push Stok',
		        	'kode' => '02'
		        ];
	        }
        } else {
        	$data = [
	        	'message' => 'Gagal Push Produk',
	        	'kode' => '01'
	        ];
        }
        return $data;
        
    }
    public function pullProduk(Request $request)
    {
        $produk = Produk::withTrashed()->where('id_outlet', $request->id_outlet)->OrderBy('id','DESC')->get();
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
    public function pullStok(Request $request)
    {
        $stok = StokKecil::where(['id_outlet'=> $request->id_outlet])->get();
        
        if (count($stok)!=0) {
            $data = [
                'stoks' => $stok,
                'message' => 'Berhasil',
                'kode'=> '00'
            ];
        } else {
            $data = [
                'message' => 'Ada Tidak Data',
                'kode'=> '01'
            ];
        }

        return $data;
    }
    public function pushStok(Request $request)
    {
        $stokawal = StokKecil::where('id_produk', $request->id_produk)->OrderBy('id', 'Desc')->first();

        if (!empty($stokawal) && !empty($request->debit)) {
            $stok = new StokKecil;
            $stok['id_outlet'] = $request->id_outlet;
            $stok['id_produk'] = $request->id_produk;
            $stok['debit'] = $request->debit;
            $stok['stok_akhir'] = $stokawal->stok_akhir+$request->debit;
            $stok['stok_awal'] = $stokawal->stok_akhir;
            $stok['waktu'] = $request->time_stok;
            $stok->save();

            if ($stok) {
                $data = [
                    'message' => 'Berhasil Push Debit Stok',
                    'kode'=> '00'
                ];
            } else {
                $data = [
                    'message' => 'Gagal Push Debit Stok',
                    'kode'=> '01'
                ];
            }
        }elseif (!empty($stokawal) && !empty($request->kredit)) {
            $stok = new StokKecil;
            $stok['id_outlet'] = $request->id_outlet;
            $stok['id_produk'] = $request->id_produk;
            $stok['kredit'] = $request->kredit;
            $stok['stok_akhir'] = $stokawal->stok_akhir-$request->kredit;
            $stok['stok_awal'] = $stokawal->stok_akhir;
            $stok['waktu'] = $request->time_stok;
            $stok->save();
            if ($stok) {
                $data = [
                    'message' => 'Berhasil Push Kredit Stok',
                    'kode'=> '00'
                ];
            } else {
                $data = [
                    'message' => 'Gagal Push Kredit Stok',
                    'kode'=> '01'
                ];
            }
        } else {
            $data = [
                'message' => 'ID Produk Tidak Ada Relasi atau Debit & Kredit Kosong',
                'kode'=> '05'
            ];
        }
    	
        return $data;
    }
    public function updateProduk(Request $request)
    {
        $find = Produk::find($request->id_produk);
        if (!empty($find)) {
            $find->fill($request->all());
            $find['updated_at'] = $request->time_produk_update;
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
    public function deleteProduk(Request $request)
    {
        $find = Produk::find($request->id_produk);
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
    public function upload(Request $request)
    {
        if ($request->hasFile('foto')){
            $namafoto = $request->file('foto')->getClientOriginalName();
            Storage::disk('ftp-mpost')->put($namafoto, fopen($request->file('foto'), 'r+'));
            $produk['foto'] = $namafoto;
            $data = [
                'nama' => $namafoto,
                'message' => 'Berhasil Upload',
                'kode' => '00'
            ];
        }else{
            $data = [
                'message' => 'Gagal Upload FTP',
                'kode' => '01'
            ];
        }

        return $data;
    }
    public function removeftp(Request $request)
    {
        Storage::disk('ftp-mpost')->delete($request->foto);
        return $request->foto;
    }
}
