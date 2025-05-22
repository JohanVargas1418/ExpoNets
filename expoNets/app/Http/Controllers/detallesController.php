<?php

namespace App\Http\Controllers;

use App\Models\detalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class detallesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalles = detalles::all();
        return response()->json($detalles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEvento'=> 'required|numeric|min:1',
            'idOrden'=> 'required|numeric|min:1',
            'idProducto'=> 'required|numeric|min:1',
            'cantidad'=> 'required|numeric',
            'metodo'=> 'required|string',
            'nombre'=> 'required|string',
            'precio'=> 'required|numeric',
            'total'=> 'required|numeric',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $detalles = detalles::create($validator->validated());
        return response()->json($detalles, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalles = detalles::find($id);

        if (!$detalles) {
            return response()->json(['message' => 'Detalles no encontrada'], 404);
        }

        return response()->json($detalles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalles = detalles::find($id);
        if (!$detalles) {
            return response()->json(['message' => 'Detalles no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idEvento'=> 'required|numeric|min:1',
            'idOrden'=> 'required|numeric|min:1',
            'idProducto'=> 'required|numeric|min:1',
            'cantidad'=> 'required|numeric',
            'metodo'=> 'required|string',
            'nombre'=> 'required|string',
            'precio'=> 'required|numeric',
            'total'=> 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $detalles->update($validator->validated());
        return response()->json($detalles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalles = detalles::find($id);
        if (!$detalles) {
            return response()->json(['message' => 'Detalles no encontrada'], 404);
        }
        $detalles->delete();
        return response()->json(['message' => 'Detalles eliminada con exito']);
    }
}
