<?php

namespace App\Livewire\User;

use App\Models\TextFunctionDefinition;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class FunctionDefinitionView extends Component
{
    /**
     * @var \App\Models\User
     */
    public $user;
    public $functionDefinitions;

    #[Url(history: true)]
    public ?int $id;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->functionDefinitions = collect();
        $this->id = null;
    }


    #[On('refresh')]
    public function refreshList()
    {
        $this->functionDefinitions = TextFunctionDefinition::where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function boot()
    {
        $this->refreshList();
    }

    public function handleItemClick(int $id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.user.function-definition');
    }
}
