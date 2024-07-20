@props([
    'icon' => null,
    'href' => null,
    'active' => false,
    'disabled' => false,
    'noRipple' => false,
])

@php

  if ($active) {
      $iconName = 'heroicon-s-' . $icon;
  } else {
      $iconName = 'heroicon-o-' . $icon;
  }

  $classes = [
      'relative',
      'inline-flex',
      'items-center',
      'justify-center',
      'overflow-hidden',
      'w-10',
      'h-10',
      'rounded-full',
      // base
      'bg-primary',
      'text-on-primary',
      // hover
      'group-hover:after:bg-on-primary',
      // focus
      'group-focus-visible:after:bg-on-primary',
      // active
      'group-active:after:bg-on-primary',
      // ripple
      'before:bg-on-primary',
  ];

  if ($disabled) {
      $classes = array_merge($classes, ['opacity-38']);
  } else {
      $classes = array_merge($classes, [
          // hover
          'group-hover:after:absolute',
          'group-hover:after:full-width',
          'group-hover:after:full-height',
          'group-hover:after:inset-0',
          'group-hover:after:opacity-8',
          'group-hover:after:rounded-full',
          // focus
          'group-focus-visible:after:absolute',
          'group-focus-visible:after:full-width',
          'group-focus-visible:after:full-height',
          'group-focus-visible:after:inset-0',
          'group-focus-visible:after:opacity-10',
          'group-focus-visible:after:rounded-full',
          'group-focus-visible:outline-none',
          // active
          'group-active:after:absolute',
          'group-active:after:full-width',
          'group-active:after:full-height',
          'group-active:after:inset-0',
          'group-active:after:opacity-10',
          'group-active:after:rounded-full',
      ]);
  }

  if (!$noRipple) {
      $classes = array_merge($classes, [
          'before:absolute',
          'before:rounded-full',
          'before:full-width',
          'before:full-height',
          'before:inset-0',
          'before:pointer-events-none',
          'before:bg-no-repeat',
          'before:bg-center',
          'before:opacity-0',
          'before:transform',
          'before:scale-10',
          'before:[transition:transform_.3s,opacity_1.2s]',
          'group-active:before:scale-0',
          'group-active:before:duration-0',
          'group-active:before:opacity-10',
      ]);
  }
  $tag = $href ? 'wrapper.a' : 'wrapper.button';

@endphp

<x-dynamic-component :component="$tag"
  {{ $attributes->class([
          'inline-flex',
          'align-bottom',
          'h-12',
          'w-12',
          'min-h-12',
          'min-w-12',
          'items-center',
          'justify-center',
          'group',
          'focus-visible:outline-none',
      ])->merge(['href' => $href]) }}>
  <div @class($classes)>
    <x-icon :name="$iconName" class="w-6 h-6 text-on-primary" />
  </div>
</x-dynamic-component>
