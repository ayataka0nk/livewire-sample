@props([
    'color' => 'primary',
    'href' => null,
    'icon' => null,
])

@php

  $classes = [
      'relative',
      'inline-flex',
      'items-center',
      'justify-center',
      'align-bottom',
      'gap-2',
      'overflow-hidden',
      'hover:after:absolute',
      'hover:after:inset-0',
      'hover:after:opacity-8',
      'active:after:absolute',
      'active:after:inset-0',
      'active:after:opacity-10',
      'before:absolute',
      'before:inset-0',
      'before:rounded-full',
      'before:pointer-events-none',
      'before:bg-no-repeat',
      'before:bg-center',
      'before:opacity-0',
      'before:transform',
      'before:scale-10',
      'before:[transition:transform_.3s,opacity_2s]',
      'active:before:scale-0',
      'active:before:opacity-10',
      'active:before:duration-0',
      'focus-visible:after:absolute',
      'focus-visible:after:inset-0',
      'focus-visible:after:opacity-10',
      'focus-visible:outline-none',
      'h-10',
      'rounded-3xl',
      'px-6',
      'text-sm',
      'font-semibold',
      'shadow-sm',
      'ring-1',
      'ring-outline',
  ];

  switch ($color) {
      case 'primary':
          $classes = array_merge($classes, [
              'text-primary',
              'hover:after:bg-primary',
              'active:after:bg-primary',
              'focus-visible:after:bg-primary',
              'before:bg-primary',
          ]);
          break;

      case 'secondary':
          $classes = array_merge($classes, [
              'text-secondary',
              'hover:after:bg-secondary',
              'active:after:bg-secondary',
              'focus-visible:after:bg-secondary',
              'before:bg-secondary',
          ]);
          break;

      case 'tertiary':
          $classes = array_merge($classes, [
              'text-tertiary',
              'hover:after:bg-tertiary',
              'active:after:bg-tertiary',
              'focus-visible:after:bg-tertiary',
              'before:bg-tertiary',
          ]);
          break;
  }

  $tag = $href ? 'wrapper.a' : 'wrapper.button';
  $iconName = 'heroicon-o-' . $icon;
  if ($icon !== null) {
      $classes = array_merge($classes, ['pl-4']);
  }
@endphp

<x-dynamic-component :component="$tag" :href="$href" {{ $attributes->class($classes) }}>
  @if ($icon !== null)
    <x-dynamic-component :component="$iconName" class="w-5 h-5" />
  @endif
  {{ $slot }}
</x-dynamic-component>
