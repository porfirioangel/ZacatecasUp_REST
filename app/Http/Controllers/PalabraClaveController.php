<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseUtils;
use App\PalabraClave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PalabraClaveController extends Controller
{
    public function getPalabrasClave(Request $request)
    {
        $palabrasClave = DB::table('palabra_clave')
            ->select(['keyword'])
            ->get();

        $palabrasArray = [];

        foreach ($palabrasClave as $palabraClave) {
            array_push($palabrasArray, $palabraClave->keyword);
        }

        return ResponseUtils::jsonResponse(200, $palabrasArray);
    }
}
