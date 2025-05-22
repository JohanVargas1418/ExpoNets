<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=usuarios:: all();
        return response()->json($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'direccion' => 'required|string|max:255',
            'email' => 'required|string|max:100',
            'imagen' => 'required|string',
            'nombre' => 'required|string|max:100',
            'password' => 'required|string|max:250',
            'telefono' => 'required|numeric',
            'tipo' => 'required|string|max:100',
            'username' => 'required|string|max:100',
        
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $usuario = usuarios::create($validator->validated());
        return response()->json($usuario,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrada'], 404);
        }

        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = usuarios::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
           'direccion' => 'required|string|max:255',
            'email' => 'required|string|max:100',
            'imagen' => 'required|string',
            'nombre' => 'required|string|max:100',
            'password' => 'required|string|max:250',
            'telefono' => 'required|numeric',
            'tipo' => 'required|string|max:100',
            'username' => 'required|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $usuario->update($validator->validated());
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = usuarios::find($id);
        if(!$usuario) {
            return response()->json(['message' => 'Usuario no encontrada'], 404);
        }
        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminada con exito']);
    }
}
