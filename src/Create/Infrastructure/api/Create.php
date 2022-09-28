<?php

namespace App\Create\Infrastructure\api;

use App\Create\Infrastructure\http\CreateCommandRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class Create
{

    public function create(CreateCommandRequest $createCommandRequest): JsonResponse
    {
        $command = $createCommandRequest->getCommand();
        return new JsonResponse($command);
    }

}