<?php

namespace App\Http\Resources;

use App\Models\Tip;
use Illuminate\Http\Resources\Json\JsonResource;

class UredjajResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tip = tip::find($this->tipId);

        return [
            'id' => $this->id,
            'vlasnik' => $this->vlasnik,
            'serviser' => $this->serviser,
            'tip' => $tip->tip,
            'popravljen' => $this->popravljen,
            'cena' => $this->cena
        ];
    }
}
