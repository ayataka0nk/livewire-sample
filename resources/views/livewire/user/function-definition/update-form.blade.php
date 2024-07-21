<form wire:submit='update'>
  <div class='flex items-center justify-between py-2'>
    <x-button type="submit" icon="check">保存</x-button>
  </div>
  <div class="bg-surface">
    <x-text-field variant='outlined' label="Name" wire:model="name" />
    <x-text-field variant='outlined' label="Definition" multiline wire:model="definition" />
  </div>
  <livewire:user.function-definition.play-ground :definition="$definition" />
  <div class='whitespace-pre-wrap'>{{ $output }}</div>
</form>
