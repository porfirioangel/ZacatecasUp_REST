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

/*
|--------------------------------------------------------------------------
| Rutas de UsuarioController
|--------------------------------------------------------------------------
*/

Route::post('login', 'UsuarioController@login');

Route::post('registrar_usuario', 'UsuarioController@registrarUsuario');

/*
|--------------------------------------------------------------------------
| Rutas de NegocioController
|--------------------------------------------------------------------------
*/

Route::get('catalogo_negocios', 'NegocioController@getCatalogoNegocios');

Route::post('registrar_negocio', 'NegocioController@registrarNegocio');

Route::put('actualizar_negocio', 'NegocioController@actualizarNegocio');

Route::delete('eliminar_negocio', 'NegocioController@eliminarNegocio');

Route::get('detalles_negocio','NegocioController@detallesNegocio');

/*
|--------------------------------------------------------------------------
| Rutas de CategoriaNegocioController
|--------------------------------------------------------------------------
*/

Route::get('obtener_categorias','CategoriaNegocioController@obtenerCategorias');

Route::post('registrar_categoria', 'CategoriaNegocioController@registrarCategoria');

Route::delete('eliminar_categoria', 'CategoriaNegocioController@eliminarCategoria');

/*
|--------------------------------------------------------------------------
| Rutas de SuscripcionController
|--------------------------------------------------------------------------
*/

Route::put('actualizar_suscripcion', 'SuscripcionController@actualizarSuscripcion');

/*
|--------------------------------------------------------------------------
| Rutas de DuenoNegocioController
|--------------------------------------------------------------------------
*/

Route::post('agregar_propietario', 'DuenoNegocioController@agregarDueno');

Route::delete('remover_propietario', 'DuenoNegocioController@removerDueno');

Route::post('lista_propietarios', 'DuenoNegocioController@listarDuenos');

/*
|--------------------------------------------------------------------------
| Rutas de CalificacionNegocioController
|--------------------------------------------------------------------------
*/

Route::post('calificar_negocio','CalificacionNegocioController@calificarNegocio');

/*
|--------------------------------------------------------------------------
| Rutas de ComentarioNegocioController
|--------------------------------------------------------------------------
*/

Route::post('agregar_comentario','ComentarioNegocioController@agregarComentario');

Route::get('obtener_comentarios','ComentarioNegocioController@obtenerComentarios');

/*
|--------------------------------------------------------------------------
| Rutas de buscarRecomendaciones
|--------------------------------------------------------------------------
*/

Route::get('buscar_recomendaciones','RecomendacionesController@buscarRecomendaciones');

