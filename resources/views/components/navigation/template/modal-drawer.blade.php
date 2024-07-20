@props([
    'appName' => null,
    'action' => null,
    'items' => [],
])

<x-navigation.drawer.modal-container {{ $attributes }}>
  <x-navigation.drawer.modal-header>
    {{ $appName }}
  </x-navigation.drawer.modal-header>
  <x-navigation.drawer.items>
    @foreach ($items as $item)
      <x-navigation.drawer.item href="{{ $item['href'] }}" icon="{{ $item['icon'] }}" label="{{ $item['label'] }}" />
    @endforeach
  </x-navigation.drawer.items>
</x-navigation.drawer.modal-container>
