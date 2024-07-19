@props([
    'href' => null,
    'icon' => null,
])

@php
  $tag = $href ? 'wrapper.a' : 'wrapper.button';
  $classes = [
      'relative',
      'overflow-hidden',
      'w-full',
      'flex',
      'items-center',
      'h-14',
      'pl-4',
      'pr-6',
      'rounded-full',
      'text-sm',
      // hover
      'hover:after:absolute',
      'hover:after:inset-0',
      'hover:after:w-full',
      'hover:after:opacity-8',
      // ripple
      'before:rounded-full',
      'before:bg-on-surface',
      'before:absolute',
      'before:inset-0',
      'before:full-width',
      'before:pointer-events-none',
      'before:bg-no-repeat',
      'before:bg-center',
      'before:transform',
      'before:opacity-0',
      'before:scale-10',
      'before:[transition:transform_.3s,opacity_1s]',
      'active:before:scale-0',
      'active:before:duration-0',
      'active:before:opacity-10',
  ];
  $active = Request::is(ltrim($href, '/') . '*');

  if ($active) {
      $classes = array_merge($classes, [
          'bg-secondary-container',
          'hover:after:bg-on-secondary-container',
          'text-on-secondary-container',
          'font-bold',
      ]);
  } else {
      $classes = array_merge($classes, [
          'bg-transparent',
          'hover:after:bg-on-secondary-container',
          'text-on-surface-variant',
          'font-medium',
      ]);
  }

  $iconName = 'heroicon-o-' . $icon;

@endphp

<x-dynamic-component :component="$tag" :href="$href" {{ $attributes->class($classes) }}>
  @if ($icon !== null)
    <x-icon :name="$iconName" class="w-6 h-6 mr-3" />
  @endif
  {{ $slot }}
</x-dynamic-component>
