<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Cuenta as CuentaResource;
use App\Cuenta;

class CuentaController extends Controller
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
        $cuenta = Cuenta::create([
            'email' => $request->cliente,
            'fecha_inicio' => $request->finicio,
            'fecha_fin' => $request->ffin,
            'estado' => $request->estado,
            'subtotal' => $request->subtotal
        ]);
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
        return new CuentaResource(Cuenta::findOrFail($id));
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
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->update($request->only/([
            'fecha_inicio','fecha_fin','estado','subtotal'
        ]));
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
        Cuenta::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
