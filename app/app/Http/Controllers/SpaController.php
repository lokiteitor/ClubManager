<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    //
    public function index()
    {
    	//retorna la vista spa de las vistas de blade
        return view('spa');
    }    
}
