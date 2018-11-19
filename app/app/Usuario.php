<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $fillable = ['email','nombre','ap_paterno',
    'ap_materno','direccion','password','telefono',
    'empleado'];
    
    public function registrosConsumos()
    {
        return $this->hasMany('App\RegistroConsumo','id_usuario','email');
    }

    public function registrosClase()
    {
        return $this->hasMany('App\RegistroClase','email','email');
    }

    public function cuentas()
    {
        return $this->hasMany('App\Cuenta','email','email');
    }

    public function clases()
    {
        return $this->hasMany('App\Clase','email','email');
    }

}
