<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    /**
     * @var \App\Models\User
     */
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
