<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    protected $fillable = ['email','fecha_inicio','fecha_fin',
    'estado','subtotal'];

    public function cliente()
    {
        return $this->belongsTo('App\Usuario','email','email');
    }
}
