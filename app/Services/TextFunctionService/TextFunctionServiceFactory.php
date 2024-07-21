<?php

namespace App\Services\TextFunctionService;

class TextFunctionServiceFactory
{
    public function create(string $type = 'velocity'): TextFunctionService
    {
        switch ($type) {
            case 'velocity':
                return app()->make(VelocityService::class);
            default:
                throw new \InvalidArgumentException('Invalid type');
        }
    }
}
