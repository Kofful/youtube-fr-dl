<?php

namespace App\Exceptions\Fragment;

use Symfony\Component\HttpFoundation\Response;

class SaveFragmentException extends CommandException
{
    protected $code = Response::HTTP_INTERNAL_SERVER_ERROR;
    protected $message = 'Unable to save the fragment on the server';
}
