<?php

namespace App\Livewire\User;

use App\Models\TextFunctionDefinition;
use App\Models\TextFunctionLog;
use App\Services\TextFunctionService\TextFunctionServiceFactory;
use Livewire\Component;

class History extends Component
{
    /**
     * @var \App\Models\User
     */
    public $user;

    public string $definition;
    public string $input;
    public string $output;
    public $logs;

    public bool $message;

    public function __construct()
    {
        $this->message = "";
        $this->definition = "";
        $this->input = "";
        $this->output = "";
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

    public function storeDefinition()
    {
        if ($this->definition) {
            TextFunctionDefinition::create([
                'name' => '無題',
                'definition' => $this->definition,
                'user_id' => $this->user->id,
            ]);
            $this->dispatch('store-definition-success');
        }
    }

    public function render()
    {
        return view('livewire.user.history');
    }
}
