<?php

namespace App\Http\Controllers;

use App\Negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecomendacionesController extends Controller
{
    private function getRecomendacionesSql($keywords)
    {
        $recomendacionesSql = "
SELECT n.id, n.nombre, n.descripcion_breve, n.latitud, n.longitud, 
  n.url_logo logotipo,
  COUNT(DISTINCT k.keyword) coincidencias,
  (SELECT SUM(cl.calificacion) / COUNT(cl.negocio_id) FROM
    calificacion_negocio cl WHERE cl.negocio_id = n.id) calificacion,
  s.tipo tipo_suscripcion
FROM negocio AS n
  INNER JOIN calificacion_negocio cl
    ON n.id = cl.negocio_id
  INNER JOIN etiqueta_negocio e
    ON n.id = e.negocio_id
  INNER JOIN palabra_clave p
    ON p.id = e.palabra_clave_id
  INNER JOIN categoria_negocio c
    ON c.id = n.categoria_negocio_id
  INNER JOIN suscripcion s
    ON s.id = n.suscripcion_id
  INNER JOIN (SELECT p.id p_id, NULL c_id, p.keyword keyword
              FROM palabra_clave p
              UNION
              SELECT NULL, c.id, c.categoria
              FROM categoria_negocio c) AS k
    ON c.id = k.c_id OR p.id = k.p_id
  WHERE k.keyword IN ('" . implode("','", $keywords) . "')
    AND NOW() < s.fecha_fin
GROUP BY id
ORDER BY tipo_suscripcion DESC, coincidencias DESC, calificacion DESC;
";

        return $recomendacionesSql;
    }


    /**
     * Obtiene las recomendaciones de negocios basado en un conjunto de
     * palabras clave.
     */
    public function buscarRecomendaciones(Request $request)
    {
        $searchQuery = $request['palabras_clave'];

        if (!Utils::isRequiredParametersComplete([$searchQuery])) {
            return Utils::parametrosIncompletosResponse(['palabras_clave']);
        }

        $tokens = $this->getSearchQueryTokens($searchQuery);

        $negocios = DB::select(DB::raw($this->getRecomendacionesSql($tokens)));

        return Utils::jsonResponse(200, $negocios);
    }


    /**
     * Separa una cadena en tokens para formar los parámetros de búsqueda de
     * un negocio, también hace combinaciones con los tokens existentes como
     * convertir palabras a plural, singular, etc.
     */
    public function getSearchQueryTokens($searchQuery)
    {
        $tokens = preg_split('/[\s]+/', $searchQuery);
        $variations = [];

        foreach ($tokens as $token) {
            if (substr($token, -2) == 'es') {
                array_push($variations, substr($token, 0, -2));
                array_push($variations, substr($token, 0, -1));
            } else if (substr($token, -1) == 's') {
                array_push($variations, substr($token, 0, -1));
            } else {
                array_push($variations, $token . 's');
                array_push($variations, $token . 'es');
            }
        }

        return array_unique(array_merge($tokens, $variations));
    }
}
