<?php

namespace App\Livewire\User\FunctionDefinition;

use App\Models\TextFunctionLog;
use App\Services\TextFunctionService\TextFunctionServiceFactory;
use Livewire\Component;

class PlayGround extends Component
{
    public \App\Models\User $user;
    public string $definition;
    public string $input;
    public string $output;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->input = "";
        $this->output = "";
    }

    public function executeFunction(TextFunctionServiceFactory $factory)
    {
        $definition = $this->definition;
        $input = $this->input;
        $service = $factory->create();
        $output = $service->execute($definition, $input);
        TextFunctionLog::create([
            'user_id' => $this->user->id,
            'definition' => $definition,
            'input' => $input,
            'output' => $output,
        ]);
        $this->output = $output;
    }

    public function render()
    {
        return view('livewire.user.function-definition.play-ground');
    }
}
