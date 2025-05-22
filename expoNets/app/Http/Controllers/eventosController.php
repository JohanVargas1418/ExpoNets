<?php

namespace App\Http\Controllers;

use App\Models\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class eventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = eventos::all();
        return response()->json($eventos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUsuario' => 'required|numeric|min:1',
            'descripcion' => 'required|string|max:300',
            'direccion' => 'required|string',
            'fechaEvento' => 'required|date',
            'hora' => 'required|time',
            'imagen' => 'required|string',
            'modalidad' => 'required|string',
            'nombre' => 'required|string',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $eventos = eventos::create($validator->validated());
        return response()->json($eventos, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventos = eventos::find($id);

        if (!$eventos) {
            return response()->json(['message' => 'Eventos no encontrada'], 404);
        }

        return response()->json($eventos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eventos = eventos::find($id);
        if (!$eventos) {
            return response()->json(['message' => 'Eventos no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idUsuario' => 'required|numeric|min:1',
            'descripcion' => 'required|string|max:300',
            'direccion' => 'required|string',
            'fechaEvento' => 'required|date',
            'hora' => 'required|time',
            'imagen' => 'required|string',
            'modalidad' => 'required|string',
            'nombre' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $eventos->update($validator->validated());
        return response()->json($eventos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventos = eventos::find($id);
        if (!$eventos) {
            return response()->json(['message' => 'Evento no encontrada'], 404);
        }
        $eventos->delete();
        return response()->json(['message' => 'Evento eliminada con exito']);
    }
}
