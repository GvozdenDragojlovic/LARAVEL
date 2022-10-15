<?php

namespace App\Http\Controllers;

use App\Http\Resources\UredjajResurs;
use App\Models\Uredjaj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UredjajController extends HandleController
{
    public function index()
    {
        $uredjaj = Uredjaj::all();
        return $this->success(UredjajResurs::collection($uredjaj), 'Vraceni svi podaci o uredjajima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vlasnik' => 'required',
            'serviser' => 'required',
            'tipId' => 'required',
            'popravljen' => 'required',
            'cena' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $uredjaj = Uredjaj::create($input);

        return $this->success(new UredjajResurs($uredjaj), 'Novi uredjaj je kreiran.');
    }


    public function show($id)
    {
        $uredjaj = Uredjaj::find($id);
        if (is_null($uredjaj)) {
            return $this->error('Uredjaj sa zadatim id-em ne postoji.');
        }
        return $this->success(new UredjajResurs($uredjaj), 'Uredjaj sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $uredjaj = Uredjaj::find($id);
        if (is_null($uredjaj)) {
            return $this->error('Uredjaj sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vlasnik' => 'required',
            'serviser' => 'required',
            'tipId' => 'required',
            'popravljen' => 'required',
            'cena' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $uredjaj->vlasnik = $input['vlasnik'];
        $uredjaj->serviser = $input['serviser'];
        $uredjaj->tipId = $input['tipId'];
        $uredjaj->popravljen = $input['popravljen'];
        $uredjaj->cena = $input['cena'];
        $uredjaj->save();

        return $this->success(new UredjajResurs($uredjaj), 'Uredjaj je azuriran.');
    }

    public function destroy($id)
    {
        $uredjaj = Uredjaj::find($id);
        if (is_null($uredjaj)) {
            return $this->error('Uredjaj sa zadatim id-em ne postoji.');
        }

        $uredjaj->delete();
        return $this->success([], 'Uredjaj je obrisan.');
    }
}
