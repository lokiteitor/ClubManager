<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Actividad as ActividadResource;
use App\Actividad;

class Clase extends JsonResource
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
            'actividad' => $this->id_actividad,
            'hinicio' => $this->hora_inicio,
            'hfin' => $this->hora_fin,
            'dsemana' => $this->dia_semana,
            'profesor' => $this->email
        ];
    }
}
