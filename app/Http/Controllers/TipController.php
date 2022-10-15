<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipResurs;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipController extends HandleController
{
    public function index()
    {
        $tipovi = Tip::all();
        return $this->success(TipResurs::collection($tipovi), 'Vraceni svi podaci o tipovima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $tip = Tip::create($input);

        return $this->success(new TipResurs($tip), 'Novi tip je kreiran.');
    }


    public function show($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->error('Tip sa zadatim id-em ne postoji.');
        }
        return $this->success(new TipResurs($tip), 'Tip sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->error('Tip sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $tip->tip = $input['tip'];
        $tip->save();

        return $this->success(new TipResurs($tip), 'Tip je azuriran.');
    }

    public function destroy($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->error('Tip sa zadatim id-em ne postoji.');
        }

        $tip->delete();
        return $this->success([], 'Tip je obrisan.');
    }
}
