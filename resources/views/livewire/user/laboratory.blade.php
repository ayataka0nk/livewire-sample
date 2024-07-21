<x-app.user.layout>
  <div class="h-screen">
    <x-app-bar.top class="md:hidden">AImyMe</x-app-bar.top>
    <div class="flex h-full">
      <!-- logs -->
      <div class='w-[300px] px-2 overflow-y-auto scrollbar-thin flex flex-col gap-2'>
        @foreach ($logs as $log)
          <x-card class="shrink-0" wire:click="handleLogClick({{ $log->id }})">
            <div class="whitespace-pre-wrap line-clamp-3">{{ $log->definition }}</div>
          </x-card>
        @endforeach

      </div>
      <!-- workspace -->
      <div class='flex-1 px-2 overflow-y-auto scrollbar-thin'>
        <div>
          <label>Definition</label>
          <x-text-field variant='outlined' multiline wire:model="definition" />
        </div>
        <div>
          <label>Input</label>
          <x-text-field variant='outlined' multiline wire:model="input" />
        </div>
        <x-button type="button" wire:click="executeFunction">実行</x-button>
        <div class='whitespace-pre-wrap'>{{ $output }}</div>
      </div>
    </div>
  </div>
</x-app.user.layout>
