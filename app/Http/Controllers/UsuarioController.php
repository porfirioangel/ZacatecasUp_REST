<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function loginIncorrectoResponse()
    {
        return Utils::jsonResponse(400, [
            'error_message' => 'Email o password incorrectos'
        ]);
    }

    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        if (!Utils::isRequiredParametersComplete([$email, $password])) {
            return Utils::parametrosIncompletosResponse(['email', 'password']);
        }

        $usuario = Usuario::where('email', '=', $email)->first();

        if (!$usuario || $usuario->password != sha1($password)) {
            return $this->loginIncorrectoResponse();
        }

        $usuario->token = sha1($usuario->id . '_' . time());
        $usuario->save();

        return Utils::jsonResponse(200, [
            'id_usuario' => $usuario->id,
            'tipo_usuario' => $usuario->tipo_usuario,
            'token' => $usuario->token
        ]);
    }
}
