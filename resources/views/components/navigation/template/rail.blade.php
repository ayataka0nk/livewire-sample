@props([
    'appName' => null,
    'action' => null,
    'items' => [],
])

<x-navigation.rail.container {{ $attributes }}>
  <x-navigation.rail.header />

  @if ($action)
    <x-navigation.rail.action-box>
      <x-button variant="fab" :icon="$action['icon']" :href="$action['href'] ?? null">{{ $action['label'] }}</x-button>
    </x-navigation.rail.action-box>
  @endif

  <x-navigation.rail.items>
    @foreach ($items as $item)
      <x-navigation.rail.item href="{{ $item['href'] }}" icon="{{ $item['icon'] }}" label="{{ $item['label'] }}" />
    @endforeach
  </x-navigation.rail.items>
</x-navigation.rail.container>
