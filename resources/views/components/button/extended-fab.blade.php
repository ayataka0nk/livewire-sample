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
      'hover:after:full-width',
      'hover:after:opacity-8',
      'active:after:absolute',
      'active:after:inset-0',
      'active:after:full-width',
      'active:after:opacity-10',
      'before:absolute',
      'before:inset-0',
      'before:full-width',
      'before:rounded-2xl',
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
      'focus-visible:after:full-width',
      'focus-visible:after:opacity-10',
      'focus-visible:outline-none',
      'h-14',
      'rounded-2xl',
      'px-6',
      'text-sm',
      'font-semibold',
  ];

  switch ($color) {
      case 'primary':
          $classes = array_merge($classes, [
              'bg-primary-container',
              'text-on-primary-container',
              'hover:after:bg-on-primary-container',
              'active:after:bg-on-primary-container',
              'focus-visible:after:bg-on-primary-container',
              'before:bg-on-primary-container',
          ]);
          break;
      case 'secondary':
          $classes = array_merge($classes, [
              'bg-secondary-container',
              'text-on-secondary-container',
              'hover:after:bg-on-secondary-container',
              'active:after:bg-on-secondary-container',
              'focus-visible:after:bg-on-secondary-container',
              'before:bg-on-secondary-container',
          ]);
          break;

      case 'tertiary':
          $classes = array_merge($classes, [
              'bg-tertiary-container',
              'text-on-tertiary-container',
              'hover:after:bg-on-tertiary-container',
              'active:after:bg-on-tertiary-container',
              'focus-visible:after:bg-on-tertiary-container',
              'before:bg-on-tertiary-container',
          ]);
          break;
  }

  if ($icon) {
      $classes = array_merge($classes, ['pl-4']);
  }

  $tag = $href ? 'wrapper.a' : 'wrapper.button';
  $iconName = 'heroicon-o-' . $icon;
@endphp

<x-dynamic-component :component="$tag" :href="$href" {{ $attributes->class($classes) }}>
  @if ($icon !== null)
    <x-icon :name="$iconName" class="w-6 h-6" />
  @endif
  {{ $slot }}
</x-dynamic-component>
