<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ResponseUtils;
use App\Login;
use App\Usuario;
use Closure;
use Validator;

class LoginRequired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
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
            ->get()
            ->first();

        $usuario = Usuario::where('token', '=', $token)
            ->get()
            ->first();

        if ($login && $usuario) {
            $request['usuario_id'] = $usuario->id;
            $request['tipo_usuario'] = $usuario->tipo_usuario;
            return $next($request);
        } else {
            return ResponseUtils::jsonResponse(401, [
                'errors' => ['El usuario no está logueado']
            ]);
        }
    }
}
