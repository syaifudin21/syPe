<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
    	$outlets = Outlet::all();
    	return view('admin.outlet', compact('outlets'));
    }
    public function create()
    {
        return view('admin.outlet-create');
    }
    public function show($id)
    {
        $outlet = Outlet::find($id);
        return view('admin.outlet-show', compact('outlet'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:outlets',
            'password' => 'required|string',
            'alamat' => 'required|string',
        ]);


        $outlet = new Outlet();
        $outlet->fill($request->all());
        $upload = app('App\Helper\Images')->upload($request->file('foto'), 'outlet');
        $outlet['foto'] = $upload['url'];
        $outlet['password'] = Hash::make($request['password']);
        $outlet->save();

        if($outlet){
            return redirect(route('admin.outlet.show',['id'=> $outlet->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('admin.outlet-edit', compact('outlet'));
    }
    public function status()
    {
        $outlet = Outlet::find($_GET['id']);
        if ($outlet->status_on == 'ON') {
            $outlet['status_on'] = 'OFF';
        }else{
            $outlet['status_on'] = 'ON';
        }
        $outlet->save();
        return response(['kode'=> '00', 'status' => $outlet->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $outlet =Outlet::findOrFail($request->id);
        $outlet->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'outlet');
            $outlet['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $outlet['password'] = Hash::make($request['password']);
        }
        $outlet->save();

        if($outlet){
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
        $outlet = Outlet::findOrFail($id);
        if (!empty($outlet)) {
            File::delete($outlet->foto);

            // foreach ($admin->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $outlet->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
