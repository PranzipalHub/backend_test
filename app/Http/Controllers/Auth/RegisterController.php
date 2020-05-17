<?php namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Http\Requests\RegisterRequest,
    Services\Authenticatable,
    Services\UserCreator
};
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        return app()->make(Authenticatable::class)->provideToken(
            auth()->login(
                $user = app()->make(UserCreator::class)->create($request->validated())
            )
        );
    }
}
