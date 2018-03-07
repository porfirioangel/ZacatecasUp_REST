<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function obtenerEventos()
    {
        $eventos = Evento::all();

        // TODO Determine which events will be filtered

        return ResponseUtils::jsonResponse(200, $eventos);
    }
}
