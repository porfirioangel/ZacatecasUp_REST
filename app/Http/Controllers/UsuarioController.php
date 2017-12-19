<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function loginIncorrectoResponse()
    {
        return Utils::jsonResponse(400, [
            'error' => 'Email o password incorrectos'
        ]);
    }

    public function emailExistenteReponse()
    {
        return Utils::jsonResponse(400, [
            'error' => 'Usuario existente'
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

        try {
            $usuario->save();
        } catch (Exception $e) {
            return Utils::jsonResponse(400, [
                'error' => $e->getMessage()
            ]);
        }

        return Utils::jsonResponse(200, [
            'id_usuario' => $usuario->id,
            'tipo_usuario' => $usuario->tipo_usuario,
            'token' => $usuario->token
        ]);
    }

    public function registrarUsuario(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $nombre = $request['nombre'];
        $tipo_usuario = $request['tipo_usuario'];

        if (!Utils::isRequiredParametersComplete([$email, $password, $nombre,
            $tipo_usuario])) {
            return Utils::parametrosIncompletosResponse(['email', 'password',
                'nombre', 'tipo_usuario']);
        }

        $usuario = Usuario::where('email', '=', $email)->first();

        if ($usuario) {
            return $this->emailExistenteReponse();
        }

        $usuario = new Usuario();
        $usuario->email = $email;
        $usuario->password = sha1($password);
        $usuario->nombre = $nombre;
        $usuario->tipo_usuario = $tipo_usuario;

        try {
            $usuario->save();
        } catch (Exception $e) {
            return Utils::jsonResponse(400, [
                'error' => $e->getMessage()
            ]);
        }

        return Utils::jsonResponse(200, [
            'ok' => true
        ]);
    }
}
