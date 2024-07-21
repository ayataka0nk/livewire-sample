<?php

namespace App\Livewire\User;

use App\Services\TextFunctionService\TextFunctionServiceFactory;
use Livewire\Component;

class Dashboard extends Component
{
    /**
     * @var \App\Models\User
     */
    public $user;

    public string $definition = '';
    public string $input = '';
    public string $output = '';

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function executeFunction(TextFunctionServiceFactory $factory)
    {
        $service = $factory->create();
        $this->output = $service->execute($this->definition, $this->input);
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
