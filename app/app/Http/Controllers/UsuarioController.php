<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Usuario as UsuarioResource;
use App\Http\Resources\RegistroConsumo as RegistroConsumoResource;
use App\Http\Resources\RegistroConsumoCollection;
use App\Http\Resources\RegistroClase as RegistroClaseResource;
use App\RegistroClase;
use App\RegistroConsumo;
use App\Usuario;
use Validator;


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
        $rules = [
            'email' => 'required',
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'direccion' => 'required',
            'password' => 'required',
            'telefono' => 'required',
            'tipo' => 'required'
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }
                
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
    public function show(Request $request,$id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        if($request->cliente == 'true' && $usuario->empleado != 'cliente'){
            return response()->json(['mensaje' => 'El usuario no es cliente'],422);
        }
        else if(($request->cliente == 'false' )&& $usuario->empleado == 'cliente'){
            return response()->json(['mensaje' => 'El usuario no es empleado'],422);
        }
        else{
            return new UsuarioResource($usuario);
        }
        
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
            'password','telefono','empleado','password'
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

    public function indexConsumo(Request $request,$id)
    {
        // mostrar todos los consumos
        $registros = Usuario::findOrFail($id)->registrosConsumos()->get();
        return new RegistroConsumoCollection($registros);
    }

    public function storeConsumo(Request $request,$usuario)
    {

            $registro = RegistroConsumo::create([
                'id_usuario' => $usuario,
                'id_producto' => $request->producto,
                'cantidad' => $request->cantidad
            ]);

        return new RegistroConsumoResource($registro);
    }

    public function showConsumo($id,$registro)
    {
        return new RegistroConsumoResource(Usuario::findOrFail($id)
        ->registrosConsumos()->find($registro));
    }

    public function updateConsumo(Request $request,$id,$idregistro)
    {
        $registro = Usuario::findOrFail($id)->registrosConsumos()->find($idregistro);

        $registro->id_producto = $request->id_producto;
        $registro->cantidad = $request->cantidad;
        $registro->save();

        return new RegistroConsumoResource($registro);

    }

    public function destroyConsumo($id,$registro)
    {
        Usuario::findOrFail($id)->registrosConsumos()->find($registro)->delete();
        return response()->json(null, 204);
    }

    public function indexClase($id)
    {
        $clases = Usuario::findOrFail($id)->registrosClase()->paginate(30);
        return  RegistroClaseResource::collection($clases);
    }

    public function storeClase(Request $request,$id)
    {
        $clase = RegistroClase::create([
            'email' => $id,
            'id_clase' => $request->id_clase,
            'estado' => 1
        ]);

        return new RegistroClaseResource($clase);
    }
    
    public function showClase($id,$registro)
    {
        return new RegistroClaseResource(Usuario::findOrFail($id)->
        registrosClase()->find($registro));
    }

    public function updateClase(Request $request,$id,$registro)
    {
        $clase = Usuario::findOrFail($id)->registrosClase()->find($registro);
        $clase->estado = $request->estado;
        $clase->save();
        return new RegistroClaseResource($clase);
    }
    public function destroyClase($id,$registro)
    {
        Usuario::findOrFail($id)->registrosClase()->find($registro)->delete();
        return response()->json(null, 204);
    }
}
