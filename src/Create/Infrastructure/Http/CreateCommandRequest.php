<?php

namespace App\Create\Infrastructure\Http;

use App\Create\Application\CreateCommand;
use App\Shared\Application\AppCommand;
use App\Shared\Infrastructure\http\RequestCommandInferface;
use Symfony\Component\HttpFoundation\Request;

class CreateCommandRequest implements RequestCommandInferface
{
    private CreateCommand $createCommand;

    public function __construct(Request $request)
    {
        $this->createCommand = new CreateCommand(
            $request->request->get("name"),
            $request->request->get("email"),
            $request->request->get("password"),
        );

    }

    public function getCommand(): AppCommand
    {
        return $this->createCommand;
    }
}