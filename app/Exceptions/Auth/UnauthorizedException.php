<?php

namespace App\Exceptions\Auth;

use App\Exceptions\AbstractException;

class UnauthorizedException extends AbstractException
{
    protected string $errorMessage = 'Unauthorized';
    protected int $statusCode = 401;
}
