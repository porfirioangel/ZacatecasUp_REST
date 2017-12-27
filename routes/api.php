<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'UsuarioController@login');

Route::post('registrar_usuario', 'UsuarioController@registrarUsuario');

Route::post('registrar_categoria', 'CategoriaNegocioController@registrarCategoria');

Route::delete('eliminar_categoria', 'CategoriaNegocioController@eliminarCategoria');

Route::get('catalogo_negocios', 'NegocioController@getCatalogoNegocios');

Route::post('registrar_negocio', 'NegocioController@registrarNegocio');

Route::put('actualizar_negocio', 'NegocioController@actualizarNegocio');

Route::delete('eliminar_negocio', 'NegocioController@eliminarNegocio');

Route::put('actualizar_suscripcion', 'NegocioController@actualizarSuscripcion');

Route::post('agregar_propietario', 'NegocioController@agregarPropietario');

Route::delete('remover_propietario', 'NegocioController@removerPropietario');

Route::post('lista_propietarios', 'NegocioController@listarPropietarios');

/**
*Calificaciones
*/
Route::resource('calificar_negocio','CalificacionNegocio\CalificarNegocioController', ['only' => ['store']]);
/**
*Comentario Negocios
*/
Route::resource('agregar_comentario','ComentarioNegocio\ComentarioNegocioController', ['only' => ['store']]);
/**
*Buscar recomendaciones
*/
Route::resource('buscar_recomendaciones','PalabraClave\PalabraClaveController', ['only' => ['index']]);
/**
*Detalles Negocio
*/
Route::get('detalles_negocio','NegocioController@detallesNegocio');
/**
*Obtener Categorias
*/
Route::get('obtener_categorias','CategoriaNegocioController@obtenerCategorias');
