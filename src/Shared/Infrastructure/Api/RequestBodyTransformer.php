<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Api;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

class RequestBodyTransformer
{
    public function transform(Request $request)
    {
        switch($request->get("Content-Type"))
        {
            case "application/json":
                $data = json_decode($request->getContent(), true);
                $request->request = new ParameterBag($data);
                break;
            default:
                break; // Lanzar una exception
        }

    }
}