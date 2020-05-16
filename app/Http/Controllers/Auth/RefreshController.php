<?php namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Services\Authenticatable
};
use Illuminate\Http\JsonResponse;

class RefreshController extends Controller
{
    public function refresh(): JsonResponse
    {
        return app()->make(Authenticatable::class)->provideToken(
            auth()->refresh()
        );
    }
}
