<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ordenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = ordenes::all();
        return response()->json($ordenes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'fechaCreacion'=> 'required|date',
            'fechaPago'=> 'required|date',
            'fechaRecibida'=> 'required|date',
            'numero'=> 'required|numeric',
            'total'=> 'required|numeric',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ordenes = ordenes::create($validator->validated());
        return response()->json($ordenes, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenes = ordenes::find($id);

        if (!$ordenes) {
            return response()->json(['message' => 'Ordenes no encontrada'], 404);
        }

        return response()->json($ordenes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ordenes = ordenes::find($id);
        if (!$ordenes) {
            return response()->json(['message' => 'Ordenes no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'fechaCreacion'=> 'required|date',
            'fechaPago'=> 'required|date',
            'fechaRecibida'=> 'required|date',
            'numero'=> 'required|numeric',
            'total'=> 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $ordenes->update($validator->validated());
        return response()->json($ordenes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordenes = ordenes::find($id);
        if (!$ordenes) {
            return response()->json(['message' => 'Ordenes no encontrada'], 404);
        }
        $ordenes->delete();
        return response()->json(['message' => 'Ordenes eliminada con exito']);
    }
}
