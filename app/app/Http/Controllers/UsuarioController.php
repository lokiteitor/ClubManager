<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Usuario as UsuarioResource;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return UsuarioResource::collection(Usuario::paginate(15));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = Usuario::create([
            'email' => $request->email,
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'direccion' => $request->direccion,
            'password' => $request->password,
            'telefono' => $request->telefono,
            'empleado' => $request->tipo
        ]);
        return new UsuarioResource($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new UsuarioResource(Usuario::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->only([
            'email','nombre','ap_paterno','ap_materno','direccion',
            'password','telefono'
        ]));
        return new UsuarioResource($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
