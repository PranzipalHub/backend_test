<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class StartupController extends Controller
{
    public function startup(): UserResource
    {
        return UserResource::make(Auth::user());
    }
}
