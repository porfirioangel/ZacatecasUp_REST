<?php

namespace App\Http\Controllers;

use App\Login;
use App\Usuario;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $email = $request['email'];
        $password = $request['password'];

        $usuario = Usuario::where('email', '=', $email)->first();

        if (!$usuario || $usuario->password != sha1($password)) {
            return $this->loginIncorrectoResponse();
        }

        $date = new DateTime();

        $usuario->token = sha1($usuario->id . '_' . $date->format('d/m/Y h:i:s'));

        try {
            $usuario->save();
            $login = new Login();
            $login->token = $usuario->token;
            $login->fecha_login = clone $date;
            $login->fecha_expiracion = clone $date;
            $login->fecha_expiracion->add(new DateInterval('PT24H'));
            $login->save();
        } catch (\Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'error' => $e->getMessage()
            ]);
        }

        return ResponseUtils::jsonResponse(200, [
            'id_usuario' => $usuario->id,
            'tipo_usuario' => $usuario->tipo_usuario,
            'token' => $usuario->token
        ]);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $session = DB::table('login')
            ->where('token', '=', $request['token'])
            ->first();

        if ($session) {
            $session = Login::find($session->id);
            $session->delete();

            return ResponseUtils::jsonResponse(200, [
                'message' => 'La sesión se cerró'
            ]);
        } else {
            return ResponseUtils::jsonResponse(200, [
                'message' => 'La sesión ya estaba cerrada'
            ]);
        }
    }

    public function registrarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required'],
            'nombre' => ['required'],
            'sexo' => ['required'],
            'fecha_nacimiento' => ['required'],
            'tipo_usuario' => ['required'],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $email = $request['email'];
        $password = $request['password'];
        $nombre = $request['nombre'];
        $sexo = $request['sexo'];
        $fecha_nacimiento = $request['fecha_nacimiento'];
        $tipo_usuario = $request['tipo_usuario'];

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

    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $token = $request['token'];

        $login = Login::where('token', '=', $token)
            ->first();

        $usuario = $login ? DB::table('usuario')
            ->where('token', '=', $request['token'])
            ->first() : null;

        if (!$usuario) {
            $usuario = new Usuario();
        }

        return ResponseUtils::jsonResponse(200, [
            'usuario_id' => $usuario->id,
            'tipo_usuario' => $usuario->tipo_usuario,
            'profile_photo' => $usuario->profile_photo,
            'token' => $usuario->token,
            'nombre' => $usuario->nombre
        ]);
    }
}
