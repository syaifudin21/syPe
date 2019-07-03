<?php

namespace App\Http\Controllers\Ownner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ownner;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:ownner');
    }
    public function profil()
    {
        $profil = Auth::user();
        return view('ownner.profil', compact('profil'));
    }

    public function profilupdate(Request $request)
    {
        $user = Ownner::findOrFail(Auth::user()->id);
        $userd = Ownner::find(Auth::user()->id);
        $user->fill($request->all());
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
        $user = Ownner::findOrFail(Auth::user()->id);
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
}
