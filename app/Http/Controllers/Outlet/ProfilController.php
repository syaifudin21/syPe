<?php

namespace App\Http\Controllers\Outlet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Outlet;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:outlet');
    }
    public function profil()
    {
        $profil = Auth::user();
        return view('outlet.profil', compact('profil'));
    }

    public function profilupdate(Request $request)
    {
        $user = Outlet::findOrFail(Auth::user()->id);
        $userd = Outlet::find(Auth::user()->id);
        $user->fill($request->all());

        if ($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'profil');
            $user['foto'] = $upload['url'];
            if(!empty($userd->foto)){
                File::delete($userd->foto);
            }
        }

        $user->update();
        if($user){
            return back()
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function profilupdatepasword(Request $request)
    {
        $user = Outlet::findOrFail(Auth::user()->id);
        if (Hash::check($request->passwordlama, $user->password)){

            if ($request->passwordbaru == $request->cpasswordbaru){
                $passwordbaru = Hash::make($request->passwordbaru);
                 $user->update(['password' => $passwordbaru]);
                 return back()
                 ->with(['alert'=> "'title':'Berhasil','text':'Password Berhasil Diupdate', 'icon':'success','buttons': false, 'timer': 1200"]);
            }else{
                return back()
                ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Konfirmasi password baru tidak sesuai', 'icon':'error'"]);
            }
        }else{
            return back()
            ->with(['alert'=> "'title':'Password lama tidak sesuai','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"]);
        }
    }
    public function status()
    {
        $dokter = Outlet::find($_GET['id']);
        if ($dokter->status_on == 'ON') {
            $dokter['status_on'] = 'OFF';
        }else{
            $dokter['status_on'] = 'ON';
        }
        $dokter->save();
        return response(['kode'=> '00', 'status' => $dokter->status_on]);
    }
}
