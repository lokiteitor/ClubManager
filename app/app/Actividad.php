<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $fillable = ['nombre','descripcion',
    'fecha_inicio','fecha_fin','lugar'];

    public function clases()
    {
        return $this->hasMany('App\Clase','id');
    }
}
