<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroClase extends Model
{
    //
    protected $fillable = ['email','id_clase','estado'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario','email','email');
    }

    public function clase()
    {
        return $this->belongsTo('App\Clase','id_clase','id');
    }
}
