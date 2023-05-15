<?php

namespace App\Exceptions\Fragment;

use Symfony\Component\HttpFoundation\Response;

class GetFragmentLinksException extends CommandException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'Unable to download the fragment from YouTube servers';
}
