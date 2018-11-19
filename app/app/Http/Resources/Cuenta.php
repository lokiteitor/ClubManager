<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Cuenta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente' => $this->email,
            'finicio' => $this->fecha_inicio,
            'ffin' => $this->fecha_fin,
            'estado' => $this->estado,
            'subtotal' => $this->subtotal
        ];
    }
}
