<?php

namespace App\Exceptions\Fragment;

use App\Exceptions\RenderableException;
use Illuminate\Support\Facades\Log;

abstract class CommandException extends RenderableException
{
    protected string $commandOutput;

    public function __construct(array $commandOutput)
    {
        parent::__construct();

        $this->commandOutput = implode("\n", $commandOutput);
    }

    public function report(): bool
    {
        Log::error("Command execution failed. Output:\n $this->commandOutput");

        return true;
    }
}
