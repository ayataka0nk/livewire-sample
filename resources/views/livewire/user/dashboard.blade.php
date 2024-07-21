<x-app.user.layout :action="[
    'label' => 'Label',
    'icon' => 'pencil',
    'href' => '/storybook/app-bar',
]">
  <div>
    <x-app-bar.top class="md:hidden">Title</x-app-bar.top>
    <h1>DashBoard</h1>
    <div>{{ $user->name }}</div>
    <div>
      <label>Definition</label>
      <x-text-field variant='outlined' multiline wire:model="definition" />
    </div>
    <div>
      <label>Input</label>
      <x-text-field variant='outlined' multiline wire:model="input" />
    </div>
    <x-button type="button" wire:click="executeFunction">Test</x-button>
    <div class='whitespace-pre-wrap'>
      Message: {{ $output }}
    </div>
  </div>
</x-app.user.layout>
