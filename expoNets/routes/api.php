<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\comentariosController;
use App\Http\Controllers\detallesController;
use App\Http\Controllers\eventosController;
use App\Http\Controllers\imagenproductoController;
use App\Http\Controllers\notificacionesController;
use App\Http\Controllers\ordenesController;
use App\Http\Controllers\pagosController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\tokens_recuperacionController;
use App\Http\Controllers\usuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('registrar', [AuthController::class, 'registrar']);
Route::post('login', [AuthController::class, 'login']);


// Rutas protegidas
Route::middleware('jwt.auth')->group(function () {
      Route::get('listarDatos', [AuthController::class, 'listarDatos']);
    Route::post('cerrar', [AuthController::class, 'logout']);

    Route::get('listarUsuarios', [usuariosController::class, 'index']);
    Route::post('creaUsuario', [usuariosController::class, 'store']);
    Route::get('listarUsuario/{id}', [usuariosController::class, 'show']);
    Route::put('editarUsuario/{id}', [usuariosController::class, 'update']);
    Route::delete('eliminarUsuario/{id}', [usuariosController::class, 'destroy']);

    Route::get('listarToken', [tokens_recuperacionController::class, 'index']);
    Route::post('crearToken', [tokens_recuperacionController::class, 'store']);
    Route::get('listarToken/{id}', [tokens_recuperacionController::class, 'show']);
    Route::put('editarToken/{id}', [tokens_recuperacionController::class, 'update']);
    Route::delete('eliminarToken/{id}', [tokens_recuperacionController::class, 'destroy']);

    Route::get('listarProductos', [productosController::class, 'index']);
    Route::post('crearProducto', [productosController::class, 'store']);
    Route::get('listarProducto/{id}', [productosController::class, 'show']);
    Route::put('editarProducto/{id}', [productosController::class, 'update']);
    Route::delete('eliminarProducto/{id}', [productosController::class, 'destroy']);

    Route::get('listarPagos', [pagosController::class, 'index']);
    Route::post('crearProducto', [productosController::class, 'store']);
    Route::get('listarProducto/{id}', [productosController::class, 'show']);
    Route::put('editarProducto/{id}', [productosController::class, 'update']);
    Route::delete('eliminarProducto/{id}', [productosController::class, 'destroy']);

    Route::get('listarOrdenes', [ordenesController::class, 'index']);
    Route::post('crearOrdenes', [ordenesController::class, 'store']);
    Route::get('listarOrdenes/{id}', [ordenesController::class, 'show']);
    Route::put('editarOrdenes/{id}', [ordenesController::class, 'update']);
    Route::delete('eliminarOrdenes/{id}', [ordenesController::class, 'destroy']);

    Route::get('listarNotificaciones', [notificacionesController::class, 'index']);
    Route::post('crearNotificaciones', [notificacionesController::class, 'store']);
    Route::get('listarNotificaciones/{id}', [notificacionesController::class, 'show']);
    Route::put('editarNotificaciones/{id}', [notificacionesController::class, 'update']);
    Route::delete('eliminarNotificaciones/{id}', [notificacionesController::class, 'destroy']);

    Route::get('listarImagen', [imagenproductoController::class, 'index']);
    Route::post('crearImagen', [imagenproductoController::class, 'store']);
    Route::get('listarImagen/{id}', [imagenproductoController::class, 'show']);
    Route::put('editarImagen/{id}', [imagenproductoController::class, 'update']);
    Route::delete('eliminarImagen/{id}', [imagenproductoController::class, 'destroy']);

    Route::get('listarEventos', [eventosController::class, 'index']);
    Route::post('crearEventos', [eventosController::class, 'store']);
    Route::get('listarEventos/{id}', [eventosController::class, 'show']);
    Route::put('editarEventos/{id}', [eventosController::class, 'update']);
    Route::delete('eliminarEventos/{id}', [eventosController::class, 'destroy']);

    Route::get('listarDetalles', [detallesController::class, 'index']);
    Route::post('crearDealles', [detallesController::class, 'store']);
    Route::get('listarDetalles/{id}', [detallesController::class, 'show']);
    Route::put('editarDetalles/{id}', [detallesController::class, 'update']);
    Route::delete('eliminarDetalles/{id}', [detallesController::class, 'destroy']);

    Route::get('listarComentarios', [comentariosController::class, 'index']);
    Route::post('crearComentaris', [comentariosController::class, 'store']);
    Route::get('listarComentarios/{id}', [comentariosController::class, 'show']);
    Route::put('editarComentarios/{id}', [comentariosController::class, 'update']);
    Route::delete('eliminarComentarios/{id}', [comentariosController::class, 'destroy']);
});
