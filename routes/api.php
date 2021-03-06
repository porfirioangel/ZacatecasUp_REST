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

/**
 * Rutas que requieren que el usuario esté logueado
 */
Route::group(['middleware' => ['login_required']], function () {
    /*
     * -------------------------------------------------------------------------
     * Descripción: Obtiene el catálogo de todos los negocios
     * -------------------------------------------------------------------------
     * Verbo http: GET
     * -------------------------------------------------------------------------
    */
    Route::post('catalogo_negocios', 'NegocioController@getCatalogoNegocios');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Registra un nuevo negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  nombre
     *  latitud
     *  longitud
     *  descripcion_breve
     *  descripcion_completa
     *  categoria_negocio_id
     *  palabras_clave
     *  sitio_web
     *  facebook
     * -------------------------------------------------------------------------
    */
    Route::post('registrar_negocio', 'NegocioController@registrarNegocio');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Actualiza un negocio existente
     * -------------------------------------------------------------------------
     * Verbo http: PUT
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id
     *  nombre
     *  latitud
     *  longitud
     *  descripcion_breve
     *  descripcion_completa
     *  categoria_negocio_id
     *  palabras_clave
     *  sitio_web
     *  facebook
     * -------------------------------------------------------------------------
    */
    Route::put('actualizar_negocio', 'NegocioController@actualizarNegocio');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Elimina un negocio
     * -------------------------------------------------------------------------
     * Verbo http: DELETE
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id
     * -------------------------------------------------------------------------
    */
    Route::delete('eliminar_negocio', 'NegocioController@eliminarNegocio');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega una nueva categoría de negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  categoria: Es el nombre de la categoría
     * -------------------------------------------------------------------------
    */
    Route::post('registrar_categoria_negocio', 'CategoriaNegocioController@registrarCategoria');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Elimina una categoría de negocio
     * -------------------------------------------------------------------------
     * Verbo http: DELETE
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id
     * -------------------------------------------------------------------------
    */
    Route::delete('eliminar_categoria_negocio', 'CategoriaNegocioController@eliminarCategoria');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Actualiza la suscripción de un negocio
     * -------------------------------------------------------------------------
     * Verbo http: PUT
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id_negocio
     *  fecha_fin:  Es la nueva fecha donde se le vencerá la suscripción al
     *              negocio
     *  tipo:       Es el tipo de suscripción a asignar, sus valores pueden ser
     *              "Normal" o "Premium"
     * -------------------------------------------------------------------------
    */
    Route::put('actualizar_suscripcion', 'SuscripcionController@actualizarSuscripcion');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega un propietario a un negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id_negocio
     *  id_usuario
     * -------------------------------------------------------------------------
    */
    Route::post('agregar_propietario', 'DuenoNegocioController@agregarDueno');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Elimina un propietario de un negocio
     * -------------------------------------------------------------------------
     * Verbo http: DELETE
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id_negocio
     *  id_usuario
     * -------------------------------------------------------------------------
    */
    Route::delete('remover_propietario', 'DuenoNegocioController@removerDueno');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Obtiene los propietarios de un negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id_negocio
     * -------------------------------------------------------------------------
    */
    Route::post('lista_propietarios', 'DuenoNegocioController@listarDuenos');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega o actualiza la calificación de un negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  usuario_id
     *  negocio_id
     *  calificación
     * -------------------------------------------------------------------------
    */
    Route::post('calificar_negocio', 'CalificacionNegocioController@calificarNegocio');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega un comentario acerca de un negocio
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  usuario_id
     *  negocio_id
     *  comentario
     * -------------------------------------------------------------------------
    */
    Route::post('agregar_comentario', 'ComentarioNegocioController@agregarComentario');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Elimina el comentario de algún negocio
     * -------------------------------------------------------------------------
     * Verbo http: DELETE
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id_negocio
     * -------------------------------------------------------------------------
    */
    Route::delete('eliminar_comentario', 'ComentarioNegocioController@eliminarComentario');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega una nueva categoría de evento
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
     * Parámetros:
     *  categoria: Es el nombre de la categoría
     * -------------------------------------------------------------------------
    */
    Route::post('registrar_categoria_evento', 'CategoriaEventoController@registrarCategoria');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Elimina una categoría de evento
     * -------------------------------------------------------------------------
     * Verbo http: DELETE
     * -------------------------------------------------------------------------
     * Parámetros:
     *  id
     * -------------------------------------------------------------------------
    */
    Route::delete('eliminar_categoria_evento', 'CategoriaEventoController@eliminarCategoria');

    /*
     * -------------------------------------------------------------------------
     * Descripción: Agrega un nuevo evento
     * -------------------------------------------------------------------------
     * Verbo http: POST
     * -------------------------------------------------------------------------
    */
    Route::post('agregar_evento', 'EventoController@agregarEvento');
});

/*
|--------------------------------------------------------------------------
| Rutas de UsuarioController
|--------------------------------------------------------------------------
*/

/*
 * -------------------------------------------------------------------------
 * Descripción: Registra un nuevo usuario en el sistema
 * -------------------------------------------------------------------------
 * Verbo http: POST
 * -------------------------------------------------------------------------
 * Parámetros:
 *  email
 *  password
 *  nombre
 *  tipo_usuario
 *  sexo
 *  fecha_nacimiento
 * -------------------------------------------------------------------------
*/
Route::post('registrar_usuario', 'UsuarioController@registrarUsuario');

/*
 * -------------------------------------------------------------------------
 * Descripción: Determina si está la sesión iniciada en el sistema
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::post('check_login', 'UsuarioController@checkLogin');

/*
 * -------------------------------------------------------------------------
 * Descripción: Inicia sesión en el sistema
 * -------------------------------------------------------------------------
 * Verbo http: POST
 * -------------------------------------------------------------------------
 * Parámetros:
 *  email
 *  password
 * -------------------------------------------------------------------------
*/
Route::post('login', 'UsuarioController@login');

/*
 * -------------------------------------------------------------------------
 * Descripción: Cierra sesión en el sistema
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::post('logout', 'UsuarioController@logout');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene los detalles de un negocio
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
 * Parámetros:
 *  id_negocio
 * -------------------------------------------------------------------------
*/
Route::get('detalles_negocio', 'NegocioController@detallesNegocio');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene las categorías de negocio existentes
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_categorias_negocio', 'CategoriaNegocioController@obtenerCategorias');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene las categorías de negocio existentes con sus ids
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_categorias_negocio_ids', 'CategoriaNegocioController@obtenerCategoriasWithIds');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene los comentarios de un negocio
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
 * Parámetros:
 *  negocio_id
 * -------------------------------------------------------------------------
*/
Route::get('obtener_comentarios', 'ComentarioNegocioController@obtenerComentarios');

/*
 * -------------------------------------------------------------------------
 * Descripción: Busca recomendaciones para una búsqueda dada
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
 * Parámetros:
 *  palabras_clave
 * -------------------------------------------------------------------------
*/
Route::get('buscar_recomendaciones', 'RecomendacionesController@buscarRecomendaciones');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene las categorías de evento existentes
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_categorias_evento', 'CategoriaEventoController@obtenerCategorias');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene los eventos disponibles
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_eventos', 'EventoController@obtenerEventos');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene las promociones disponibles
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_promociones', 'PromocionNegocioController@obtenerPromociones');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene el catálogo de palabras clave
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('palabras_clave', 'PalabraClaveController@getPalabrasClave');

/*
 * -------------------------------------------------------------------------
 * Descripción: Obtiene las categorías de evento existentes
 * -------------------------------------------------------------------------
 * Verbo http: GET
 * -------------------------------------------------------------------------
*/
Route::get('obtener_categorias_evento', 'CategoriaEventoController@obtenerCategorias');