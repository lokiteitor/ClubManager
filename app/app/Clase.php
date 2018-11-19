<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    protected $fillable = ['id_actividad','hora_inicio','hora_fin',
    'dia_semana','email'];

    public function actividad()
    {
        return $this->belongsTo('App\Actividad','id_actividad','id');
    }

    public function registrosClase()
    {
        return $this->hasMany('App\RegistroClase','id_clase');
    }

    public function maestro()
    {
        return $this->belongsTo('App\Usuario','email','email');
    }

}
