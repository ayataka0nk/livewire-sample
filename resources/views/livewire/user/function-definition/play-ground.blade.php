<div>
  <div class="bg-surface">
    <x-text-field variant='outlined' label="Input" multiline wire:model="input" />
    <x-button variant="outlined" type="button" wire:click="executeFunction">実行</x-button>
  </div>
  <div class="whitespace-pre-wrap">
    {{ $output }}
  </div>
</div>
