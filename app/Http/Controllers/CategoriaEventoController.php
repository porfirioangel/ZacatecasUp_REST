<?php

namespace App\Http\Controllers;

use App\CategoriaEvento;
use Illuminate\Http\Request;

class CategoriaEventoController extends Controller
{
    public function obtenerCategorias()
    {
        $categorias = CategoriaEvento::all();
        $json_array = json_decode($categorias, true);

        $categoriaNames = [];

        foreach ($json_array as $categoria) {
            array_push($categoriaNames, $categoria['categoria']);
        }

        return ResponseUtils::jsonResponse(200, $categoriaNames);
    }
}
