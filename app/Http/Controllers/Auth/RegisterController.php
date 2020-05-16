<?php namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Http\Requests\RegisterRequest,
    Services\Authenticatable,
    Services\UserRepository
};
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        return app()->make(Authenticatable::class)->provideToken(
            auth()->login(
                $user = app()->make(UserRepository::class)->create($request->validated())
            )
        );
    }
}
