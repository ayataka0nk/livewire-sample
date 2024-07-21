<?php

namespace App\Livewire\User\FunctionDefinition;

use App\Models\TextFunctionDefinition;
use Livewire\Component;

class UpdateForm extends Component
{
    public int $id;
    public string $name;
    public string $definition;
    public string $input;
    public string $output;

    public function __construct()
    {
        $this->name = "";
        $this->definition = "";
    }

    public function boot()
    {
        $record = TextFunctionDefinition::find($this->id);
        $this->name = $record->name;
        $this->definition = $record->definition;
    }

    public function update()
    {
        if ($this->name && $this->definition) {
            $record = TextFunctionDefinition::find($this->id);
            $record->update([
                'name' => $this->name,
                'definition' => $this->definition,
            ]);
            $this->dispatch('entry-changed');
        }
    }

    public function render()
    {
        return view('livewire.user.function-definition.update-form');
    }
}
