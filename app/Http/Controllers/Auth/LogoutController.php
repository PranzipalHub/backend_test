<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(null, 204);
    }
}
