<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    const AUTH_ERROR_MESSAGE = 'Token could not be parsed from the request.';

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception): Response
    {
        $message = $exception->getMessage();

        if ($exception instanceof AbstractException) {
            return response(['message' => $message], $exception->getCode());
        }

        if ($exception instanceof TokenExpiredException) {
            return response(null, 200);
        }

        if ($exception instanceof JWTException
            && $message === self::AUTH_ERROR_MESSAGE) {
            return response(['message' => $message], 400);
        }

        if ($exception instanceof BadRequestHttpException) {
            return response(['message' => $message], 400);
        }

        if ($exception instanceof ConflictHttpException) {
            return response(['message' => $message], 409);
        }

        if ($exception instanceof ThrottleRequestsException) {
            return response(
                ['message' => "Slow down, homesearching isn't a race"],
                $exception->getStatusCode()
            )->withHeaders(
                Arr::add(
                    $exception->getHeaders(),
                    'Access-Control-Allow-Origin',
                    $request->headers->get('Origin')
                )
            );
        }

        return parent::render($request, $exception);
    }
}
