<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Images extends Model
{
    public function upload($request, $path, $name = null)
    {
        $filenamewithextension = $request->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->getClientOriginalExtension();
        $directori = 'images/'.env('APP_ENV').'/'.$path.'/';
        $filenamefile = empty($name)? $filename.uniqid().'.'.$extension: $name.'_'.$filename.uniqid().'.'.$extension;
        $request->move($directori,$filenamefile);
        return [
            'url' => $directori.$filenamefile,
            'name' => $filename
        ];
    }
    public function storage($request, $path, $name = null)
    {
        $filenamewithextension = $request->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->getClientOriginalExtension();
        $directori = 'images/'.env('APP_ENV').'/'.$path.'/';
        $filenamefile = empty($name)? $filename.uniqid().'.'.$extension: $name.'_'.$filename.uniqid().'.'.$extension;
        Storage::disk('public')->put($filenamefile, fopen($request, 'r+'));
        return [
            'url' => $directori.$filenamefile,
            'name' => $filename
        ];
    }
    public function number($id, $auth)
    {
        $iduser = sprintf('%09d', $id);
        $auth = ($auth=='Dokter')? 930: 210;
        $formula = $auth.$iduser;

        return $formula;
    }
}
