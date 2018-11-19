<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Clase as ClaseResource;
use App\Clase;

class ClaseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $clase = Clase::create([
            'id_actividad' => $request->id_actividad,
            'hora_inicio' => $request->hinicio,
            'hora_fin' => $request->hfin,
            'dia_semana' => $request->dia,
            'email' => $request->profesor
        ]);
        
        return new ClaseResource($clase);
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
        return ClaseResource(Clase::findOrFail($id));
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
        $clase = Clase::findOrFail($id);
        $clase->update($request->only([                        
            'hora_inicio' => $request->hinicio,
            'hora_fin' => $request->hfin,
            'dia_semana' => $request->dia,
            'email' => $request->instructor
        ]));
        return new ClaseResource($clase);
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
        Clase::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
