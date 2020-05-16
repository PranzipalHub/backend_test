<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class Authenticatable
{
    public function provideToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
