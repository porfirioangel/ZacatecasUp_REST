<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function loginIncorrectoResponse()
    {
        return ResponseUtils::jsonResponse(400, [
            'error' => 'Email o password incorrectos'
        ]);
    }

    public function emailExistenteReponse()
    {
        return ResponseUtils::jsonResponse(400, [
            'error' => 'Usuario existente'
        ]);
    }

    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];

        if (!ResponseUtils::isRequiredParametersComplete([$email, $password])) {
            return ResponseUtils::parametrosIncompletosResponse(['email', 'password']);
        }

        $usuario = Usuario::where('email', '=', $email)->first();

        if (!$usuario || $usuario->password != sha1($password)) {
            return $this->loginIncorrectoResponse();
        }

        $usuario->token = sha1($usuario->id . '_' . time());

        try {
            $usuario->save();
        } catch (Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'error' => $e->getMessage()
            ]);
        }

        $request->session()->put('usuario_id', $usuario->id);
        $request->session()->put('tipo_usuario', $usuario->tipo_usuario);
        $request->session()->put('profile_photo', $usuario->profile_photo);
        $request->session()->put('token', $usuario->token);

        return ResponseUtils::jsonResponse(200, [
            'id_usuario' => $usuario->id,
            'tipo_usuario' => $usuario->tipo_usuario,
            'token' => $usuario->token
        ]);
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return ResponseUtils::jsonResponse(200, [
            'message' => 'Sesión cerrada correctamente'
        ]);
    }

    public function registrarUsuario(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $nombre = $request['nombre'];
        $sexo = $request['sexo'];
        $fecha_nacimiento = $request['fecha_nacimiento'];
        $tipo_usuario = $request['tipo_usuario'];

        if (!ResponseUtils::isRequiredParametersComplete([$email, $password, $nombre,
            $tipo_usuario, $sexo, $fecha_nacimiento])) {
            return ResponseUtils::parametrosIncompletosResponse(['email', 'password',
                'nombre', 'tipo_usuario', 'sexo', 'fecha_nacimiento']);
        }

        $usuario = Usuario::where('email', '=', $email)->first();

        if ($usuario) {
            return $this->emailExistenteReponse();
        }

        $usuario = new Usuario();
        $usuario->email = $email;
        $usuario->password = sha1($password);
        $usuario->nombre = $nombre;
        $usuario->sexo = $sexo;
        $usuario->fecha_nacimiento = $fecha_nacimiento;
        $usuario->tipo_usuario = $tipo_usuario;

        try {
            $usuario->save();
            $usuario->profile_photo = '/uploads/' . sha1('usuario_' .
                    $usuario->id);
            $usuario->save();
        } catch (Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'error' => $e->getMessage()
            ]);
        }

        return ResponseUtils::jsonResponse(200, [
            'ok' => true,
            'profile_photo' => $usuario->profile_photo
        ]);
    }

    public function checkLogin(Request $request) {
        $usuario_id = $request->session()->get('usuario_id', null);
        $tipo_usuario = $request->session()->get('tipo_usuario', null);
        $profile_photo = $request->session()->get('profile_photo', null);
        $token = $request->session()->get('token', null);

        return ResponseUtils::jsonResponse(200, [
            'usuario_id' => $usuario_id,
            'tipo_usuario' => $tipo_usuario,
            'profile_photo' => $profile_photo,
            'token' => $token
        ]);
    }
}
