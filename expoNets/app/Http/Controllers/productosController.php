<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = productos::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|numeric|min:1' ,
            'activo'=> 'required|string|max:255',
            'cantidad'=> 'required|numeric|max:255',
            'categoria'=> 'required|string|max:255',
            'descripcion'=> 'required|string|max:255',
            'nombre'=> 'required|string|max:255',
            'precio'=> 'required|numeric',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $productos = productos::create($validator->validated());
        return response()->json($productos, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productos = productos::find($id);

        if (!$productos) {
            return response()->json(['message' => 'Producto no encontrada'], 404);
        }

        return response()->json($productos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productos = productos::find($id);
        if (!$productos) {
            return response()->json(['message' => 'Productos no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|numeric|min:1' ,
            'activo'=> 'required|string|max:255',
            'cantidad'=> 'required|numeric|max:255',
            'categoria'=> 'required|string|max:255',
            'descripcion'=> 'required|string|max:255',
            'nombre'=> 'required|string|max:255',
            'precio'=> 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $productos->update($validator->validated());
        return response()->json($productos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productos = productos::find($id);
        if (!$productos) {
            return response()->json(['message' => 'Producto no encontrada'], 404);
        }
        $productos->delete();
        return response()->json(['message' => 'Producto eliminada con exito']);
    }
}
