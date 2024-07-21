<form wire:submit='store'>
  <div class='flex items-center justify-between py-2'>
    <x-button type="submit" icon="check">保存</x-button>
  </div>
  <div class="bg-surface">
    <x-text-field variant='outlined' label="Name" wire:model="name" />
    <x-text-field variant='outlined' label="Definition" multiline wire:model="definition" />
    <x-text-field variant='outlined' label="Input" multiline wire:model="input" />
    <x-button variant="outlined" type="button" wire:click="executeFunction">実行</x-button>
  </div>
  <div class='whitespace-pre-wrap'>{{ $output }}</div>
</form>
