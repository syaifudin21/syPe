<?php

namespace App\Http\Controllers\Outlet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukOutlet;
use Illuminate\Support\Facades\Auth;
use App\Models\StokProdukOutlet;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:outlet');
    }
    public function index()
    {
        $produks = ProdukOutlet::all();
    	return view('outlet.produk', compact('produks'));
    }
    public function create()
    {
        return view('outlet.produk-create');
    }
    public function show($id)
    {
        $produk = ProdukOutlet::find($id);
        return view('outlet.produk-show', compact('produk'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_beli' => 'required|string',
            'harga_jual' => 'required|string',
            'stok_awal' => 'required'
        ]);

        $produk = new ProdukOutlet();
        $produk->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'produk');
            $produk['foto'] = $upload['url'];
        }
        $produk['outlet_id'] = Auth::user()->id;
        $produk->save();

        $stok = new StokProdukOutlet();
        $stok['produk_id'] = $produk->id;
        $stok['stok_awal'] = $request->stok_awal;
        $stok['kredit'] = $request->stok_awal;
        $stok['debit'] = 0;
        $stok['keterangan'] = "Stok Awal Pembuatan Produk";
        $stok['stok_akhir'] = $request->stok_awal;
        $stok->save();

        if($produk){
            return redirect(route('outlet.produk.show',['id'=> $produk->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $produk = ProdukOutlet::findOrFail($id);
        return view('outlet.produk-edit', compact('produk'));
    }
    public function status()
    {
        $produk = ProdukOutlet::find($_GET['id']);
        if ($produk->status_on == 'ON') {
            $produk['status_on'] = 'OFF';
        }else{
            $produk['status_on'] = 'ON';
        }
        $produk->save();
        return response(['kode'=> '00', 'status' => $produk->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_beli' => 'required|string',
            'harga_jual' => 'required|string',
        ]);

        $produk =ProdukOutlet::findOrFail($request->id);
        $produk->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'produk');
            $produk['foto'] = $upload['url'];
        }
        $produk->save();

        if($produk){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function stok()
    {
        if (isset($_GET['id'])) {
            $stoks = ProdukOutlet::where('produk_id', $_GET['id'])->orderBy('id','DESC')->get();
            return view('outlet.produk-stok', compact('stoks'));
        }else{
            return back()
            ->with(['alert'=> "'title':'Muat Gagal','text':'ID Produk tidak ada yang cocok', 'icon':'error'"]);
        }
    }
    public function delete($id)
    {
        $produk = ProdukOutlet::findOrFail($id);
        if (!empty($produk)) {
            File::delete($produk->foto);

            // foreach ($outlet->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $produk->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
