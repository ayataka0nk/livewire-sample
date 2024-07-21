<?php

namespace App\Services\TextFunctionService;

interface TextFunctionService
{
    public function execute(string $definition, string $argument): string;
}
