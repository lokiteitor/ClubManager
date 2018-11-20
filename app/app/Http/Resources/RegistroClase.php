<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Clase as ClaseResource;
use App\Clase;

class RegistroClase extends JsonResource
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
            'usuario' => $this->email,
            'estado' => $this->estado,
            'clase' => new ClaseResource(Clase::find($this->id_clase))
        ];
    }
}
