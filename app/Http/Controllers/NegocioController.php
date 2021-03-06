<?php

namespace App\Http\Controllers;

use App\CategoriaNegocio;
use App\EtiquetaNegocio;
use App\GaleriaNegocio;
use App\Http\Validators\CategoriaNegocioExistente;
use App\Http\Validators\NegocioUnico;
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
        $usuarioId = $request['usuario_id'];
        $tipoUsuario = $request['tipo_usuario'];

        if ($tipoUsuario == 'Administrador') {
            $negocios = DB::table('negocio as n')
                ->leftJoin('suscripcion as s', 's.id', '=', 'n.suscripcion_id')
                ->select(['n.id', 'n.nombre', 'n.url_logo',
                    's.fecha_fin as fecha_fin_suscripcion',
                    's.tipo as tipo_suscripcion'])
                ->get();
        } else {
            $negocios = DB::table('negocio as n')
                ->leftJoin('suscripcion as s', 's.id', '=', 'n.suscripcion_id')
                ->leftJoin('dueno_negocio as dn', 'dn.negocio_id', '=', 'n.id')
                ->select(['n.id', 'n.nombre', 'n.url_logo',
                    's.fecha_fin as fecha_fin_suscripcion',
                    's.tipo as tipo_suscripcion'])
                ->where('dn.usuario_id', '=', $usuarioId)
                ->get();
        }

        return ResponseUtils::jsonResponse(200, $negocios);
    }

    /**
     * Registra un nuevo negocio
     */
    public function registrarNegocio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', new NegocioUnico],
            'latitud' => ['required', 'numeric'],
            'longitud' => ['required', 'numeric'],
            'descripcion_breve' => ['required'],
            'descripcion_completa' => ['required'],
            'categoria_negocio_id' => ['required', 'numeric', new CategoriaNegocioExistente],
            'palabras_clave' => ['required'],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        try {

            $negocio = Negocio::create($request->all());
            $negocio->url_logo = '/uploads/' . sha1('logo_negocio' .
                    $negocio->id);
            $negocio->save();

            for ($i = 1; $i <= 3; $i++) {
                $galeria = new GaleriaNegocio();
                $galeria->url_foto = '/uploads/' . sha1('galeria_' .
                        $negocio->id . '_' . $i);
                $galeria->negocio_id = $negocio->id;
                $galeria->save();
            }

            $palabrasClave = json_decode($request['palabras_clave']);
            $palabrasClave = $this->getPalabrasClaveInstances($palabrasClave);

            foreach ($palabrasClave as $palabraClave) {
                $etiquetaNegocio = new EtiquetaNegocio();
                $etiquetaNegocio->negocio_id = $negocio->id;
                $etiquetaNegocio->palabra_clave_id = $palabraClave->id;
                $etiquetaNegocio->save();
            }

            return ResponseUtils::jsonResponse(200, [
                'id' => $negocio->id,
                'nombre' => $negocio->nombre,
                'url_logo' => $negocio->url_logo,
                'fecha_fin_suscripcion' => null,
                'tipo_suscripcion' => null,
                'galeria' => [
                    sha1('/uploads/galeria_' . $negocio->id . '_1'),
                    sha1('/uploads/galeria_' . $negocio->id . '_2'),
                    sha1('/uploads/galeria_' . $negocio->id . '_3')
                ]
            ]);
        } catch (\Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => [$e]
            ]);
        }
    }

    /**
     * Actualiza un negocio existente
     */
    public function actualizarNegocio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric', new NegocioExistente],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $all_parameters = [
            'sitio_web' => $request['sitio_web'],
            'facebook' => $request['facebook'],
            'nombre' => $request['nombre'],
            'latitud' => $request['latitud'],
            'longitud' => $request['longitud'],
            'descripcion_breve' => $request['descripcion_breve'],
            'descripcion_completa' => $request['descripcion_completa'],
            'categoria_negocio_id' => $request['categoria_negocio_id'],
            'palabras_clave' => $request['palabras_clave'],
        ];

        $valued_parameters = [];

        foreach ($all_parameters as $key => $value) {
            if ($value) {
                $valued_parameters[$key] = $value;
            }
        }

        $negocioId = $request['id'];
        Negocio::find($negocioId)->update($valued_parameters);

        EtiquetaNegocio::where('negocio_id', '=', $negocioId)->delete();
        $palabrasClave = json_decode($request['palabras_clave']);
        $palabrasClave = $this->getPalabrasClaveInstances($palabrasClave);

        foreach ($palabrasClave as $palabraClave) {
            $etiquetaNegocio = new EtiquetaNegocio();
            $etiquetaNegocio->negocio_id = $negocioId;
            $etiquetaNegocio->palabra_clave_id = $palabraClave->id;
            $etiquetaNegocio->save();
        }

        $negocio = Negocio::find($request['id']);

        return ResponseUtils::jsonResponse(200, [
            'id' => $negocio->id,
            'nombre' => $negocio->nombre,
            'url_logo' => $negocio->url_logo,
            'fecha_fin_suscripcion' => null,
            'tipo_suscripcion' => null
        ]);
    }

    /**
     * A partir de las palabras clave en el array recibido como parámetro,
     * inserta en la base de datos aquellas que aún no lo estén, y devuelve
     * un array con la palabra clave y su id en la base de datos.
     */
    public function getPalabrasClaveInstances($palabrasClaveArray)
    {
        $palabrasClaveDb = [];

        foreach ($palabrasClaveArray as $palabra) {
            $palabraClave = PalabraClave::where('keyword', '=', $palabra)
                ->get()
                ->first();

            if ($palabraClave) {
                array_push($palabrasClaveDb, $palabraClave);
            } else {
                $palabraClave = new PalabraClave();
                $palabraClave->keyword = $palabra;

                try {
                    $palabraClave->save();
                    array_push($palabrasClaveDb, $palabraClave);
                } catch (\Exception $e) {
                    return ResponseUtils::jsonResponse(400, [
                        'errors' => ['Error del servidor']
                    ]);
                }
            }
        }

        return $palabrasClaveDb;
    }

/**
 * Elimina un negocio existente
 */
public
function eliminarNegocio(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id' => ['required', 'numeric', new NegocioExistente],
    ]);

    if (!$validator->passes()) {
        return ResponseUtils::jsonResponse(400, [
            'errors' => $validator->errors()->all()
        ]);
    }

    $negocio = Negocio::find($request['id']);

    try {
        $negocio->delete();
        return ResponseUtils::jsonResponse(200, $negocio);
    } catch (\Exception $e) {
        return ResponseUtils::jsonResponse(400, [
            'errors' => [$e]
        ]);
    }
}


/**
 * Obtiene los detalles de un negocio
 */
public
function detallesNegocio(Request $request)
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
    unset($detallesResponse['suscripcion_id']);
    $detallesResponse['categoria'] = $categoria->categoria;
    $detallesResponse['calificacion'] =
        CalificacionNegocioController::getCalificacionNegocio($negocio['id']);

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
        ->count();

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