<?php

namespace App\Http\Controllers;

use App\CategoriaEvento;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function obtenerEventos()
    {
        // TODO Determine which past events will be filtered
        
        $eventos = DB::table('evento')
            ->orderBy('fecha_inicio')
            ->get();

        foreach ($eventos as $evento) {
            $categoria = CategoriaEvento::find($evento->categoria_evento_id);
            $evento->categoria = $categoria->categoria;
            unset($evento->categoria_evento_id);
        }

        return ResponseUtils::jsonResponse(200, $eventos);
    }
}
