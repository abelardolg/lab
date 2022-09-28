<?php

namespace App\Shared\Application;

interface AppCommand
{
public function toArray(): array;
}