<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistroConsumo extends JsonResource
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
            'cliente' => $this->cliente,
            'producto' => new ProductoResource(Producto::find($request->producto)),
            'cantidad' => $this->cantidad
        ];    
    }
}
