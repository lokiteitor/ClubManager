<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = ['nombre','descripcion','precio','costo'];

    public function registrosConsumo()
    {
        return $this->hasMany('App\RegistroConsumo','id');
    }    
}
