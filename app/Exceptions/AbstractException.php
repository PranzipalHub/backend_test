<?php

namespace App\Exceptions;

abstract class AbstractException extends \Exception
{
    protected string $errorMessage;
    protected int $statusCode;

    public function __construct()
    {
        parent::__construct($this->errorMessage, $this->statusCode);
    }
}
