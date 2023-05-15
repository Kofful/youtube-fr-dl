<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

abstract class RenderableException extends \Exception
{
    protected $code = Response::HTTP_INTERNAL_SERVER_ERROR;
}
