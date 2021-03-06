<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Actividad as ActividadResource;
use App\Actividad;
use App\Http\Resources\Clase as ClaseResource;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ActividadResource::collection(Actividad::paginate(15));
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
        $actividad = Actividad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->finicio,
            'fecha_fin' => $request->ffin,
            'lugar' => $request->lugar
        ]);

        return new ActividadResource($actividad);
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
        return new ActividadResource(Actividad::findOrFail($id));
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
        $actividad = Actividad::findOrFail($id);
        $actividad->update($request->only([
            'nombre','descripcion','fecha_inicio','fecha_fin','lugar'
        ]));
        return new ActividadResource($actividad);
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
        Actividad::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getClases($id)
    {
        $actividad = Actividad::findOrFail($id)->clases()->get();
        return ClaseResource::collection($actividad);
    }
}
