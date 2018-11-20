<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Producto as ProductoResource;
use App\Resource;
use App\Producto;

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
            'cliente' => $this->id_usuario,
            'producto' => new ProductoResource(Producto::find($this->id_producto)),
            'cantidad' => $this->cantidad
        ];    
    }
}
