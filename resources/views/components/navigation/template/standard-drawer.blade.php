@props([
    'appName' => null,
    'action' => null,
    'items' => [],
])

<x-navigation.drawer.container {{ $attributes }}>
  <x-navigation.drawer.header>{{ $appName }}</x-navigation.drawer.header>
  @if ($action)
    <x-navigation.drawer.action-box>
      <x-button class="w-full" variant="extended-fab" :icon="$action['icon']"
        :href="$action['href'] ?? null">{{ $action['label'] }}</x-button>
    </x-navigation.drawer.action-box>
  @endif
  <x-navigation.drawer.items>
    @foreach ($items as $item)
      <x-navigation.drawer.item href="{{ $item['href'] }}" icon="{{ $item['icon'] }}" label="{{ $item['label'] }}" />
    @endforeach
  </x-navigation.drawer.items>
</x-navigation.drawer.container>
