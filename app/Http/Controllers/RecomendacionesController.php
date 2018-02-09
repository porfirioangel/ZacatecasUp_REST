<?php

namespace App\Http\Controllers;

use App\Negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use DateTime;

class RecomendacionesController extends Controller
{
    /**
     * Función de comparación de recomendaciones usada para la ordenación de
     * una colección de las mismas.
     */
    public function cmp($a, $b)
    {
        // Comparación para orden descendente
        $difference = $b->ponderacion_promedio - $a->ponderacion_promedio;

        if ($difference > 0) {
            return 1;
        } else if ($difference < 0) {
            return -1;
        } else {
            $differencePS = $b->ponderacion_suscripcion -
                $a->ponderacion_suscripcion;
            $differencePC = $b->ponderacion_coincidencias -
                $a->ponderacion_coincidencias;
            $differenceC = $b->calificacion - $a->calificacion;

            if ($differencePS > 0) {
                return 1;
            } else if ($differencePS < 0) {
                return -1;
            } else if ($differencePC > 0) {
                return 1;
            } else if ($differencePC < 0) {
                return -1;
            } else if ($differenceC > 0) {
                return 1;
            } else if ($differenceC < 0) {
                return -1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Obtiene las recomendaciones de negocios basado en un conjunto de
     * palabras clave.
     */
    public function buscarRecomendaciones(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'palabras_clave' => ['required'],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $searchQuery = strtolower($request['palabras_clave']);
        $recomendaciones = $this->getCurrentRecomendaciones();
        $this->addQueryMatches($recomendaciones, $searchQuery);
        $this->addPointsAverage($recomendaciones);
        $recomendaciones = $recomendaciones->toArray();

        usort($recomendaciones, array($this, "cmp"));

        return $recomendaciones;
    }

    /**
     * Obtiene una colección de recomendaciones que están vigentes, pero que
     * no han sido filtradas conforme la búsqueda del usuario.
     */
    private function getCurrentRecomendaciones()
    {
        $recomendaciones = DB::table('negocio as n')
            ->join('suscripcion as s', 's.id', '=', 'n.suscripcion_id')
            ->select(['n.id as id_negocio', 'nombre', 'descripcion_breve', 'latitud',
                'longitud', 'url_logo as logotipo',
                's.tipo as tipo_suscripcion'])
            ->where('s.fecha_fin', '>=', new DateTime())
            ->get();

        foreach ($recomendaciones as $recomendacion) {
            $calificacion =
                CalificacionNegocioController::getCalificacionNegocio
                ($recomendacion->id_negocio);
            $recomendacion->calificacion = $calificacion;

            $tipo = $recomendacion->tipo_suscripcion;

            if ($tipo == 'Normal') {
                $recomendacion->ponderacion_suscripcion = 2.5;
            } else if ($tipo == 'Premium') {
                $recomendacion->ponderacion_suscripcion = 5;
            } else {
                $recomendacion->ponderacion_suscripcion = 0;
            }
        }

        return $recomendaciones;
    }

    /**
     * Agrega a cada recomendación las coincidencias de sus palabras clave
     * con la búsqueda del usuario.
     */
    private function addQueryMatches($recomendaciones, $userQuery)
    {
        $maxCoincidencias = 0;

        foreach ($recomendaciones as $recomendacion) {
            $keywords = $this->getKeywordArray($recomendacion->id_negocio);
            $keywordsStr = implode(' ', $keywords);
            $searchTokens = $this->getSearchQuerySingularWords($userQuery);
            $coincidencias = 0;

            foreach ($searchTokens as $word) {
                $coincidencias += substr_count($keywordsStr, $word);
            }

            $coincidencias += 10;

            $recomendacion->coincidencias = $coincidencias;

            if ($coincidencias > $maxCoincidencias) {
                $maxCoincidencias = $coincidencias;
            }
        }

        foreach ($recomendaciones as $recomendacion) {
            $ponderacion = $recomendacion->coincidencias * 5 /
                $maxCoincidencias;
            $recomendacion->ponderacion_coincidencias = $ponderacion;
        }
    }

    /**
     * Obtiene un arreglo con las keywords, que son las palabras clave y las
     * categorías.
     */
    private function getKeywordArray($negocioId)
    {
        $palabrasClave = DB::table('palabra_clave as pc')
            ->join('etiqueta_negocio as en', 'pc.id', '=', 'en.palabra_clave_id')
            ->select([DB::raw('LOWER(keyword) as keyword')])
            ->where('en.negocio_id', '=', $negocioId);

        $categorias = DB::table('categoria_negocio as cn')
            ->join('negocio as n', 'cn.id', '=', 'n.categoria_negocio_id')
            ->select([DB::raw('LOWER(categoria) as keyword')])
            ->where('n.id', '=', $negocioId);

        $keywords = $palabrasClave->union($categorias)->get();

        $array = [];

        foreach ($keywords as $keyword) {
            array_push($array, $keyword->keyword);
        }

        return $array;
    }

    /**
     * Obtiene un arreglo con las palabras de la búsqueda del usuario
     * convertidas a singular.
     */
    private function getSearchQuerySingularWords($searchQuery)
    {
        $tokens = preg_split('/[\s]+/', $searchQuery);
        $singulars = [];

        foreach ($tokens as $token) {
            if (substr($token, -2) == 'es') {
                array_push($singulars, substr($token, 0, -2));
                array_push($singulars, substr($token, 0, -1));
            } else if (substr($token, -1) == 's') {
                array_push($singulars, substr($token, 0, -1));
            } else {
                array_push($singulars, $token);
            }
        }

        return array_unique($singulars);
    }

    /**
     * Agrega a cada recomendación el promedio de sus ponderaciones.
     */
    private function addPointsAverage($recomendaciones)
    {
        foreach ($recomendaciones as $recomendacion) {
            $average = round(($recomendacion->calificacion +
                    $recomendacion->ponderacion_suscripcion +
                    $recomendacion->ponderacion_coincidencias) / 3, 1);
            $recomendacion->ponderacion_promedio = $average;
        }
    }
}
