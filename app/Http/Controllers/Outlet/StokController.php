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
        $stokakhir = StokProdukOutlet::where('produk_id', $_GET['prodak_id'])->orderBy('id', 'DESC')->first();
        $stokawal = empty($stokakhir)? $this->baru($request) : $this->akumulasi($request, $stokakhir);
        dd($stokawal);
    }
    public function baru($request)
    {
        $stok = new StokProdukOutlet();
        $stok->fill($request->all());
        $stok->save();

        if ($stok) {
            return true;
        }else{
            return false;
        }
    }
    public function akumulasi($request)
    {
        # code...
    }
}
