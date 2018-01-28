<?php

namespace App\Exceptions;

use App\Http\Controllers\ResponseUtils;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            $status = $exception->getStatusCode();

            switch ($status) {
                case '404':
                    return ResponseUtils::jsonResponse(404, [
                        'error' => 'Ruta no encontrada'
                    ]);
                case '405':
                    return ResponseUtils::jsonResponse(405, [
                        'error' => 'Verbo http inválido'
                    ]);
                default:
                    return ResponseUtils::jsonResponse(400, [
                        'error' => 'Error desconocido'
                    ]);
            }
        } else {
            return ResponseUtils::jsonResponse(400, [
                'error' => $exception->getMessage()
            ]);
        }
    }
}
