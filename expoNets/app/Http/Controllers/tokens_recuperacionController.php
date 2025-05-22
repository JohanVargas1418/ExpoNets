<?php

namespace App\Http\Controllers;

use App\Models\tokens_recuperacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tokens_recuperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $token = tokens_recuperacion::all();
        return response()->json($token);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'usuario_id' => 'required|numeric|min:1',
            'fechaExpiraion' => 'required|string|max:255',
            'token' => 'required|string|max:100',


        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $token = tokens_recuperacion::create($validator->validated());
        return response()->json($token, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $token = tokens_recuperacion::find($id);

        if (!$token) {
            return response()->json(['message' => 'Tokens de recuperacion no encontrada'], 404);
        }

        return response()->json($token);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $token = tokens_recuperacion::find($id);
        if (!$token) {
            return response()->json(['message' => 'Tokens de recuperacion no encontrada'], 404);
        }
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|numeric|min:1',
            'fechaExpiraion' => 'required|string|max:255',
            'token' => 'required|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $token->update($validator->validated());
        return response()->json($token);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = tokens_recuperacion::find($id);
        if (!$token) {
            return response()->json(['message' => 'Tokens de recuperacion no encontrada'], 404);
        }
        $token->delete();
        return response()->json(['message' => 'Tokens de recuperacion eliminada con exito']);
    }
}
