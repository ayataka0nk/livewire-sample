@props([
    'variant' => 'filled',
])

@php
  $componentName = 'card.' . $variant;
@endphp

<x-dynamic-component :component="$componentName" {{ $attributes }}>
  {{ $slot }}
</x-dynamic-component>
