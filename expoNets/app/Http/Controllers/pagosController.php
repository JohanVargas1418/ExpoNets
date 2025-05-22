<?php

namespace App\Http\Controllers;

use App\Models\pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = pagos::all();
        return response()->json($pagos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1' ,
            'numero_tarjeta' => 'required|numeric',
            'fecha_vencimiento' => 'required|date',
            'codigo_seguridad'=> 'required|numeric',
            'monto_a_pagar'=> 'required|numeric',
            'direccion_facturacion'=> 'required|string',
            'codigo_postal'=> 'required|numeric',
            'fecha_pago'=> 'required|date',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pagos = pagos::create($validator->validated());
        return response()->json($pagos, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pagos = pagos::find($id);

        if (!$pagos) {
            return response()->json(['message' => 'Pagos no encontrada'], 404);
        }

        return response()->json($pagos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pagos = pagos::find($id);
        if (!$pagos) {
            return response()->json(['message' => 'Usuario no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1' ,
            'numero_tarjeta' => 'required|numeric',
            'fecha_vencimiento' => 'required|date',
            'codigo_seguridad'=> 'required|numeric',
            'monto_a_pagar'=> 'required|numeric',
            'direccion_facturacion'=> 'required|string',
            'codigo_postal'=> 'required|numeric',
            'fecha_pago'=> 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $pagos->update($validator->validated());
        return response()->json($pagos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pagos = pagos::find($id);
        if (!$pagos) {
            return response()->json(['message' => 'Pagos no encontrada'], 404);
        }
        $pagos->delete();
        return response()->json(['message' => 'Pagos eliminada con exito']);
    }
}
