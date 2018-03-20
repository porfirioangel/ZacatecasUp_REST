<?php

namespace App\Http\Controllers;

use App\CategoriaEvento;
use App\Evento;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

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
            $fecha_inicio = new DateTime($evento->fecha_inicio);
            $fecha_fin = new DateTime($evento->fecha_fin);
            $evento->fecha_inicio = $fecha_inicio->format('d/m/Y h:i a');
            $evento->fecha_fin = $fecha_fin->format('d/m/Y h:i a');
        }
        
        return ResponseUtils::jsonResponse(200, $eventos);
    }

    public function agregarEvento(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required'],
            'fecha' => ['required'],
            'latitud' => ['required', 'numeric'],
            'longitud' => ['required', 'numeric'],
            'costo' => ['required'],
            'url_flyer' => ['required', 'max:255'],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $evento = Evento::create($request->all());

        return ResponseUtils::jsonResponse(200, $evento);
    }
}
