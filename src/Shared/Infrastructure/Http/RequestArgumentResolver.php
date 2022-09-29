<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Http;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Shared\Infrastructure\Api\RequestBodyTransformer;
use Generator;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestArgumentResolver implements ArgumentValueResolverInterface
{
    private ValidatorInterface $validator;
    private RequestBodyTransformer $requestBodyTransformer;

    public function __construct(ValidatorInterface $validator, RequestBodyTransformer $requestBodyTransformer)
    {
        $this->validator = $validator;
        $this->requestBodyTransformer = $requestBodyTransformer;
    }

    /**
     * @throws \ReflectionException
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        $reflectionClass = new ReflectionClass($argument->getType());

        return ($reflectionClass->implementsInterface(RequestCommandInferface::class));
    }

    public function resolve(Request $request, ArgumentMetadata $argument): Generator
    {
        $class = $argument->getType();

        $this->requestBodyTransformer->transform($request);

        $command = new $class($request);

        $errors = $this->validator->validate($command->getCommand());

        if (count($errors) > 0) {
            throw new BadRequestHttpException((string) $errors);
        }

        yield $command;
    }
}