<?php

namespace App\Http\Controllers;

use App\Models\notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class notificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificaciones = notificaciones::all();
        return response()->json($notificaciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'titulo'=> 'required|string',
            'mensaje'=> 'required|string',
            'leido'=> 'required|string',
            'fecha'=> 'required|date',
            'tipo'=> 'required|string',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $notificaciones = notificaciones::create($validator->validated());
        return response()->json($notificaciones, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notificaciones = notificaciones::find($id);

        if (!$notificaciones) {
            return response()->json(['message' => 'Notificacines no encontrada'], 404);
        }

        return response()->json($notificaciones);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notificaciones = notificaciones::find($id);
        if (!$notificaciones) {
            return response()->json(['message' => 'Notificacion no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'idUsuario'=> 'required|numeric|min:1',
            'titulo'=> 'required|string',
            'mensaje'=> 'required|string',
            'leido'=> 'required|string',
            'fecha'=> 'required|date',
            'tipo'=> 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $notificaciones->update($validator->validated());
        return response()->json($notificaciones);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notificaciones = notificaciones::find($id);
        if (!$notificaciones) {
            return response()->json(['message' => 'Notificaciones no encontrada'], 404);
        }
        $notificaciones->delete();
        return response()->json(['message' => 'Notificaciones eliminada con exito']);
    }
}
