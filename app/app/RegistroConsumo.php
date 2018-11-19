<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroConsumo extends Model
{
    //
    protected $fillable = ['id_usuario','id_producto','cantidad'];

    public function cliente()
    {
        return $this->belongsTo('App\Usuario','email','id_usuario');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto','id_producto','id');
    }

}
