<?php

namespace App\Http\Controllers;

use App\Models\comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class comentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = comentarios::all();
        return response()->json($comentarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'fecha'=> 'required|date',
            'hora'=> 'required|time',
            'comentario'=> 'required|string|max:300',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $comentarios = comentarios::create($validator->validated());
        return response()->json($comentarios, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comentarios = comentarios::find($id);

        if (!$comentarios) {
            return response()->json(['message' => 'Comentarios no encontrada'], 404);
        }

        return response()->json($comentarios);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comentarios = comentarios::find($id);
        if (!$comentarios) {
            return response()->json(['message' => 'Comentarios no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'fecha'=> 'required|date',
            'hora'=> 'required|time',
            'comentario'=> 'required|string|max:300',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $comentarios->update($validator->validated());
        return response()->json($comentarios);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comentarios = comentarios::find($id);
        if (!$comentarios) {
            return response()->json(['message' => 'Comentarios no encontrada'], 404);
        }
        $comentarios->delete();
        return response()->json(['message' => 'Comentarios eliminada con exito']);
    }
}
