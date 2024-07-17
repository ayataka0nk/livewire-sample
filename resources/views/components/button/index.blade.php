@props(['variant' => 'filled'])

@php
  $componentName = 'button.' . $variant;
@endphp

<x-dynamic-component :component="$componentName" {{ $attributes }}>
  {{ $slot }}
</x-dynamic-component>
