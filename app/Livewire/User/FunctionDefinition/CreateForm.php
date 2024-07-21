<?php

namespace App\Livewire\User\FunctionDefinition;

use App\Models\TextFunctionDefinition;
use App\Models\TextFunctionLog;
use App\Services\TextFunctionService\TextFunctionServiceFactory;
use Livewire\Component;

class CreateForm extends Component
{
    public \App\Models\User $user;
    public string $name;
    public string $definition;
    public string $input;
    public string $output;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->name = "";
        $this->definition = "";
        $this->input = "";
        $this->output = "";
    }


    public function store()
    {
        if ($this->name && $this->definition) {
            TextFunctionDefinition::create([
                'name' => $this->name,
                'definition' => $this->definition,
                'user_id' => $this->user->id,
            ]);
            $this->name = '';
            $this->definition = '';
            $this->dispatch('entry-changed');
        }
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
        return view('livewire.user.function-definition.create-form');
    }
}
