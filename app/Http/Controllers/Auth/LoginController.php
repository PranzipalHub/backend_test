<?php namespace App\Http\Controllers\Auth;

use App\{
    Exceptions\Auth\UnauthorizedException,
    Http\Controllers\Controller,
    Http\Requests\LoginRequest,
    Services\Authenticatable
};
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new UnauthorizedException();
        }

        return app()->make(Authenticatable::class)->provideToken($token);
    }
}
