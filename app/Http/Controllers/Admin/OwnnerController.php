<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ownner;
use Illuminate\Support\Facades\Hash;

class OwnnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $ownners = Ownner::all();
    	return view('admin.ownner', compact('ownners'));
    }
    public function create()
    {
        return view('admin.ownner-create');
    }
    public function show($id)
    {
        $ownner = Ownner::find($id);
        return view('admin.ownner-show', compact('ownner'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:ownners',
            'password' => 'required|string',
            'alamat' => 'required|string',
        ]);


        $ownner = new Ownner();
        $ownner->fill($request->all());
        $upload = app('App\Helper\Images')->upload($request->file('foto'), 'ownner');
        $ownner['foto'] = $upload['url'];
        $ownner['password'] = Hash::make($request['password']);
        $ownner->save();

        if($ownner){
            return redirect(route('admin.ownner.show',['id'=> $ownner->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $ownner = Ownner::findOrFail($id);
        return view('admin.ownner-edit', compact('ownner'));
    }
    public function status()
    {
        $ownner = Ownner::find($_GET['id']);
        if ($ownner->status_on == 'ON') {
            $ownner['status_on'] = 'OFF';
        }else{
            $ownner['status_on'] = 'ON';
        }
        $ownner->save();
        return response(['kode'=> '00', 'status' => $ownner->status_on]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $ownner =Ownner::findOrFail($request->id);
        $ownner->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'ownner');
            $ownner['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $ownner['password'] = Hash::make($request['password']);
        }
        $ownner->save();

        if($ownner){
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
        $ownner = Ownner::findOrFail($id);
        if (!empty($ownner)) {
            File::delete($ownner->foto);

            // foreach ($admin->galeri()->get() as $galeri) {
            //     File::delete($galeri->foto);
            //     $galeri->delete();
            // }

            $ownner->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
