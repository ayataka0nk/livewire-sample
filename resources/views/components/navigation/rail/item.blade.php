@props([
    'href' => null,
    'icon' => null,
    'active' => false,
    'label' => null,
])

@php

  $tag = $href ? 'wrapper.a' : 'wrapper.button';

  $iconName = 'heroicon-o-' . $icon;
  $active = Request::is(ltrim($href, '/') . '*');
  $classes = [
      'display',
      'flex',
      'flex-col',
      'items-center',
      'h-14',
      'text-on-surface',
      'cursor-pointer',
      // hover
      '[&>div]:hover:after:pointer-events-none',
      '[&>div]:hover:after:absolute',
      '[&>div]:hover:after:inset-0',
      '[&>div]:hover:after:w-full',
      '[&>div]:hover:after:h-full',
      '[&>div]:hover:after:bg-on-surface',
      '[&>div]:hover:after:opacity-8',
      // ripple
      '[&>div]:before:absolute',
      '[&>div]:before:inset-0',
      '[&>div]:before:w-full',
      '[&>div]:before:h-full',
      '[&>div]:before:bg-on-surface',
      '[&>div]:before:opacity-0',
      '[&>div]:before:transform',
      '[&>div]:before:scale-10',
      '[&>div]:before:[transition:transform_.3s,opacity_1.2s]',
      '[&>div]:active:before:scale-0',
      '[&>div]:active:before:duration-0',
      '[&>div]:active:before:opacity-10',
  ];

@endphp

<x-dynamic-component :component="$tag" @class($classes) {{ $attributes->merge(['href' => $href]) }}>
  <div @class([
      'overflow-hidden',
      'relative',
      'flex',
      'items-center',
      'justify-center',
      'w-14',
      'h-8 rounded-xl' => $label,
      'h-14 rounded-4xl' => !$label,
      'bg-secondary-container' => $active,
  ])>
    <x-icon :name="$iconName" class="w-6 h-6" />
  </div>
  @if ($label)
    <span @class(['text-xs', 'mt-1', 'font-bold' => $active])>{{ $label }}</span>
  @endif
</x-dynamic-component>
