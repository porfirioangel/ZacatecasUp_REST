<?php

namespace App\Http\Controllers\ComentarioNegocio;

use App\ComentarioNegocio;
use Illuminate\Http\Request;
use App\Http\Controllers\Utils;
use App\Http\Controllers\Controller;

class ComentarioNegocioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'usuario_id' => 'required',
            'negocio_id' => 'required',
            'comentario' => 'required'
        ];
        $this->validate($request, $reglas);
        $campos = $request->all();
        $campos['fecha'] = date('Y-m-d h:i:s');
        $comentario = ComentarioNegocio::create($campos);
        return response()->json(['data' =>$comentario],201);
    }
}
