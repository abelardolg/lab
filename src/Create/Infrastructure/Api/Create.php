<?php

namespace App\Create\Infrastructure\Api;

use App\Create\Infrastructure\Http\CreateCommandRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class Create
{

    public function create(CreateCommandRequest $createCommandRequest): JsonResponse
    {
        $command = $createCommandRequest->getCommand();
        return new JsonResponse($command);
    }

}