<?php

namespace App\Http\Controllers;

use App\CategoriaNegocio;
use App\EtiquetaNegocio;
use App\Negocio;
use App\ComentarioNegocio;
use App\Http\Validators\NegocioExistente;
use App\PalabraClave;
use DateTime;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class NegocioController extends Controller
{
    /**
     * Obtiene el catálogo de los negocios dados de alta con la finalidad de
     * administrarlos
     */
    public function getCatalogoNegocios(Request $request)
    {
        // TODO Implementar la lógica de la petición

        $negociosExistentesResponse = ResponseUtils::jsonResponse(200, [
            [
                'id' => 1,
                'nombre' => 'Macdonnals',
                'url_logo' => 'logos/logo_1.png',
                'tipo_suscripcion' => 'Premium',
                'fecha_fin_suscripcion' => '2017-12-01'
            ],
            [
                'id' => 2,
                'nombre' => 'KFC',
                'url_logo' => 'logos/logo_1.png',
                'tipo_suscripcion' => 'Básica',
                'fecha_fin_suscripcion' => '2017-12-31'
            ]
        ]);

        $negociosInexistentesReponse = ResponseUtils::jsonResponse(200, []);

        return $negociosExistentesResponse;
//        return $negociosInexistentesReponse;
    }

    /**
     * Registra un nuevo negocio
     */
    public function registrarNegocio(Request $request)
    {
        // Parámetros obligatorios
        $nombre = $request['nombre'];
        $latitud = $request['latitud'];
        $longitud = $request['longitud'];
        $descripcion_breve = $request['descripcion_breve'];
        $descripcion_completa = $request['descripcion_completa'];
        $categoria_negocio_id = $request['categoria_negocio_id'];
        $palabras_clave = $request['palabras_clave'];

        // Parámetros opcionales
        $sitio_web = $request['sitio_web'];
        $facebook = $request['facebook'];

        if (!ResponseUtils::isRequiredParametersComplete([$nombre, $latitud,
            $longitud, $descripcion_breve, $descripcion_completa,
            $categoria_negocio_id, $palabras_clave])) {
            return ResponseUtils::parametrosIncompletosResponse(['nombre', 'latitud',
                'longitud', 'descripcion_breve', 'descripcion_completa',
                'categoria_negocio_id', 'palabras_clave']);
        }

        // TODO Implementar la lógica de la petición
        // Nombre logo '/uploads/' . sha1('logo_negocio' . $negocio->id)

        $negocioRegistradoResponse = ResponseUtils::jsonResponse(200, [
            'id' => 3,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        // Nombre galeria: sha1('galeria_' . id_negocio . '_' . num_foto)

        return $negocioRegistradoResponse;
//        return ResponseUtils::categoriaInexistenteResponse();
    }

    /**
     * Actualiza un negocio existente
     */
    public function actualizarNegocio(Request $request)
    {
        // Parámetros obligatorios
        $id = $request['id'];

        // Parámetros opcionales
        $sitio_web = $request['sitio_web'];
        $facebook = $request['facebook'];
        $nombre = $request['nombre'];
        $latitud = $request['latitud'];
        $longitud = $request['longitud'];
        $descripcion_breve = $request['descripcion_breve'];
        $descripcion_completa = $request['descripcion_completa'];
        $categoria_negocio_id = $request['categoria_negocio_id'];
        $palabras_clave = $request['palabras_clave'];

        if (!ResponseUtils::isRequiredParametersComplete([$id])) {
            return ResponseUtils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioActualizadoResponse = ResponseUtils::jsonResponse(200, [
            'id' => $id,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        return $negocioActualizadoResponse;
//        return ResponseUtils::categoriaInexistenteResponse();
//        return ResponseUtils::negocioInexistenteResponse();
    }

    /**
     * Elimina un negocio existente
     */
    public function eliminarNegocio(Request $request)
    {
        $id = $request['id'];

        if (!ResponseUtils::isRequiredParametersComplete([$id])) {
            return ResponseUtils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioEliminadoResponse = ResponseUtils::jsonResponse(200, [
            'id' => $id
        ]);

        return $negocioEliminadoResponse;
//        return ResponseUtils::negocioInexistenteResponse();
    }

    /**
     * Obtiene la calificación de un negocio
     */
    private function getCalificacionNegocio($idNegocio)
    {
        $calificacionSql = "SELECT SUM(cl.calificacion) / " .
            "COUNT(cl.negocio_id) calificacion FROM calificacion_negocio " .
            "cl WHERE cl.negocio_id = " . $idNegocio . ";";

        $calificacion = DB::select(DB::raw($calificacionSql));

        return $calificacion[0]->calificacion;
    }

    /**
     * Obtiene los detalles de un negocio
     */
    public function detallesNegocio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', 'numeric', new NegocioExistente],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $negocio = Negocio::find($request['id_negocio'])->toArray();

        $categoria = CategoriaNegocio::find($negocio['categoria_negocio_id']);

        $detallesResponse = array_merge([], $negocio);
        $detallesResponse['logotipo'] = $detallesResponse['url_logo'];
        unset($detallesResponse['url_logo']);
        unset($detallesResponse['categoria_negocio_id']);
        unset($detallesResponse['suscripcion_id']);
        $detallesResponse['categoria'] = $categoria->categoria;
        $detallesResponse['calificacion'] =
            $this->getCalificacionNegocio($negocio['id']);

        $palabrasClave = DB::table('palabra_clave')
            ->join('etiqueta_negocio', 'palabra_clave.id', '=',
                'etiqueta_negocio.palabra_clave_id')
            ->where('etiqueta_negocio.negocio_id', '=', $negocio['id'])
            ->select('palabra_clave.keyword')->get();

        $detallesResponse['palabras_clave'] = [];

        foreach ($palabrasClave as $palabra) {
            array_push($detallesResponse['palabras_clave'], $palabra->keyword);
        }

        $comentarios = DB::table('comentario_negocio as cm')
            ->join('usuario as u', 'u.id', '=', 'cm.usuario_id')
            ->where('negocio_id', '=', $negocio['id'])
            ->select('cm.fecha', 'cm.comentario', 'u.nombre as autor',
                'u.profile_photo as autor_foto')
            ->get();

        foreach ($comentarios as $comentario) {
            $date = new DateTime($comentario->fecha);
            $comentario->fecha = $date->format('d/m/Y h:i a');
        }

        $detallesResponse['comentarios'] = $comentarios;

        $galeria = DB::table('galeria_negocio as gn')
            ->where('gn.negocio_id', '=', $negocio['id'])
            ->select('url_foto')
            ->get();

        $detallesResponse['galeria'] = [];

        foreach ($galeria as $foto) {
            array_push($detallesResponse['galeria'], $foto->url_foto);
        }

        $descripcionCompleta = json_decode($negocio['descripcion_completa'],
            true);

        $detallesResponse['descripcion_completa'] = $descripcionCompleta;

        return ResponseUtils::jsonResponse(200, $detallesResponse);
    }

}