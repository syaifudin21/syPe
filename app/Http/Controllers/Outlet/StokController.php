<?php

namespace App\Http\Controllers\Outlet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StokProdukOutlet;

class StokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:outlet');
    }
    public function show()
    {
        $stoks = StokProdukOutlet::where('produk_id', $_GET['produk_id'])->orderBy('id', 'DESC')->get();
        return view('outlet.produk-stok', compact('stoks'));
    }
    public function store(Request $request)
    {
        $stokakhir = StokProdukOutlet::where('produk_id', $request['produk_id'])->orderBy('id', 'DESC')->first();
        $stok = empty($stokakhir)? $this->baru($request) : $this->akumulasi($request, $stokakhir);
        
        $json = json_decode($stok, true);

        if(['status']){
            return back()
            ->with(['alert'=> "'title':'Berhasil','text':".$stok->message.", 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text': ".$stok->message.", 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function baru($request)
    {
        $stok = new StokProdukOutlet();
        $stok->fill($request->all());
        $stok->save();

        if ($stok) {
            return json_encode(['status' => true, 'message' => 'Berhasil menambahkan stok']);
        }else{
            return json_encode(['status' => false, 'message' => 'Gagal menambahkan stok']);
        }
    }
    public function akumulasi($request, $stokakhir)
    {
        if ($request->status == 'Debit' && $stokakhir->stok_akhir < $request->stok) {
            return json_encode(['status' => false, 'message' => 'jumlah stok melebihi batas pengurangan']);
        }
        $stok = new StokProdukOutlet();
        $stok['produk_id'] = $request->produk_id;
        $stok['stok_awal'] = $stokakhir->stok_akhir;
        $stok['kredit'] = $request->status == 'Kredit' ? $request->stok: 0;
        $stok['debit'] = $request->status == 'Debit' ? $request->stok: 0;
        $stok['stok_akhir'] = $request->status == 'Debit' ?  $stokakhir->stok_akhir - $request->stok:  $stokakhir->stok_akhir + $request->stok;
        $stok['keterangan'] = $request->keterangan;
        $stok['invoice'] = empty($request->invoice)? 0 : $request->invoice;
        $stok->save();

        if ($stok) {
            return json_encode(['status' => true, 'message' => 'Berhasil menambahkan stok']);
        }else{
            return json_encode(['status' => false, 'message' => 'Gagal menambahkan stok']);
        }
    }
}
