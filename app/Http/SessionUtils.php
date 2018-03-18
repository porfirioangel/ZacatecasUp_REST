<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 3/18/18
 * Time: 3:18 PM
 */

namespace App\Http;


use Illuminate\Http\Request;

class SessionUtils
{
    public static function getSessionData(Request $request)
    {
        return [
            'usuario_id' => $request->session()->get('usuario_id', null),
            'tipo_usuario' => $request->session()->get('tipo_usuario', null),
            'profile_photo' => $request->session()->get('profile_photo', null),
            'token' => $request->session()->get('token', null),
        ];
    }
}