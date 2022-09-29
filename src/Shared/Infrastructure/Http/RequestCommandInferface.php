<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Http;

use App\Shared\Application\AppCommand;
use Symfony\Component\HttpFoundation\Request;

interface RequestCommandInferface
{
    public function __construct(Request $request);
    public function getCommand(): AppCommand;
}