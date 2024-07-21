<?php

namespace App\Services\TextFunctionService;

class TextFunctionServiceFactory
{
    public function create(string $type = ''): TextFunctionService
    {
        switch ($type) {
            default:
                return app()->make(VelocityService::class);
        }
    }
}
