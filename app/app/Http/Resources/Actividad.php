<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Actividad extends JsonResource
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
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'finicio' => $this->fecha_inicio,
            'ffin' => $this->fecha_fin,
            'lugar' => $this->lugar
        ];
    }
}
