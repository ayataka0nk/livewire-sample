<x-app.user.layout>
  <div class="h-screen bg-surface">
    <x-app-bar.top class="md:hidden">AImyMe</x-app-bar.top>
    <div class="flex h-full">
      <!-- function definitions -->
      <div class='w-[300px] px-2 overflow-y-auto scrollbar-thin flex flex-col gap-2'>
        @foreach ($functionDefinitions as $functionDefinition)
          <x-card :key="$functionDefinition->id" class="shrink-0" wire:click="handleItemClick({{ $functionDefinition->id }})">
            <div class="whitespace-pre-wrap line-clamp-3">{{ $functionDefinition->name }}</div>
          </x-card>
        @endforeach
      </div>

      <!-- workspace -->
      <div class='flex-1 px-2 overflow-y-auto scrollbar-thin' wire:key={{ $id }}>
        @if ($id === null)
          <div></div>
        @elseif ($id === 0)
          <livewire:user.function-definition.create-form />
        @else
          <livewire:user.function-definition.update-form :id="$id" :key="$id" />
        @endif

      </div>
    </div>
  </div>
</x-app.user.layout>
<script>
  document.addEventListener('livewire:init', () => {
    Livewire.on('store-definition-success', () => {
      alert("success!")
    })
  });
</script>
