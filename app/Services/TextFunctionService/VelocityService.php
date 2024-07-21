<?php

namespace App\Services\TextFunctionService;

use Illuminate\Support\Facades\Http;

class VelocityService implements TextFunctionService
{
    public function execute(string $definition, string $input): string
    {
        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.api_key'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $definition,
                ],
                [
                    'role' => 'user',
                    'content' => $input,
                ],
            ],
        ]);
        $output = $result['choices'][0]['message']['content'];
        return $output;
    }
}
