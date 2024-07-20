@props(['variant' => 'standard'])

@php
  $componentName = 'icon-button.' . $variant;
@endphp

<x-dynamic-component :component="$componentName" {{ $attributes }}>
  {{ $slot }}
</x-dynamic-component>
