@props([
    'variant' => 'filled',
])

@php
  $componentName = 'text-field.' . $variant;

@endphp
<x-dynamic-component :component="$componentName" {{ $attributes }}>
  {{ $slot }}
</x-dynamic-component>
