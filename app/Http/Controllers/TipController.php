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


    

    
}
