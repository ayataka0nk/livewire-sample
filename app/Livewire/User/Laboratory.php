<?php

namespace App\Livewire\User;

use App\Models\TextFunctionLog;
use App\Services\TextFunctionService\TextFunctionServiceFactory;
use Livewire\Component;

class Laboratory extends Component
{
    /**
     * @var \App\Models\User
     */
    public $user;

    public string $definition;
    public string $input;
    public string $output;
    public $logs;

    public function __construct()
    {
        $this->definition = '';
        $this->input = "default\nvalval";
        $this->output = '';
        $this->logs = collect();
    }

    public function refreshLogs()
    {
        $this->logs = TextFunctionLog::where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->refreshLogs();
    }

    public function handleLogClick(int $logId)
    {
        $log = TextFunctionLog::find($logId);
        $this->definition = $log->definition;
        $this->input = $log->input;
        $this->output = $log->output;
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
        $this->refreshLogs();
    }

    public function render()
    {
        return view('livewire.user.laboratory');
    }
}
