<?php

namespace App\Http\Controllers\Outlet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasir;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:outlet');
    }
    public function index()
    {
        $kasirs = Kasir::all();
    	return view('outlet.kasir', compact('kasirs'));
    }
    public function create()
    {
        return view('outlet.kasir-create');
    }
    public function show($id)
    {
        $kasir = Kasir::find($id);
        return view('outlet.kasir-show', compact('kasir'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:kasirs',
            'password' => 'required|string',
            'alamat' => 'required|string',
        ]);


        $kasir = new Kasir();
        $kasir['outlet_id']= Auth::user()->id;
        $kasir->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'kasir');
            $kasir['foto'] = $upload['url'];
        }
        $kasir['password'] = Hash::make($request['password']);
        $kasir->save();

        if($kasir){
            return redirect(route('outlet.kasir.show',['id'=> $kasir->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('outlet.kasir-edit', compact('kasir'));
    }
    public function status()
    {
        $kasir = Kasir::find($_GET['id']);
        if ($kasir->status_on == 'ON') {
            $kasir['status_on'] = 'OFF';
        }else{
            $kasir['status_on'] = 'ON';
        }
        $kasir->save();
        return response(['kode'=> '00', 'status' => $kasir->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $kasir =Kasir::findOrFail($request->id);
        $kasir->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'kasir');
            $kasir['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $kasir['password'] = Hash::make($request['password']);
        }
        $kasir->save();

        if($kasir){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function delete($id)
    {
        $kasir = Kasir::findOrFail($id);
        if (!empty($kasir)) {
            File::delete($kasir->foto);

            // foreach ($outlet->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $kasir->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
