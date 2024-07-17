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
      'active:after:full-width',
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
      'before:bg-on-primary',
  ];

  switch ($color) {
      case 'primary':
          $classes = array_merge($classes, [
              'bg-primary',
              'text-on-primary',
              'hover:after:bg-on-primary',
              'active:after:bg-on-primary',
              'focus-visible:after:bg-on-primary',
          ]);
          break;
      case 'secondary':
          $classes = array_merge($classes, [
              'bg-secondary',
              'text-on-secondary',
              'hover:after:bg-on-secondary',
              'active:after:bg-on-secondary',
              'focus-visible:after:bg-on-secondary',
          ]);
          break;

      case 'tertiary':
          $classes = array_merge($classes, [
              'bg-tertiary',
              'text-on-tertiary',
              'hover:after:bg-on-tertiary',
              'active:after:bg-on-tertiary',
              'focus-visible:after:bg-on-tertiary',
          ]);
          break;
  }

  $tag = $href ? 'wrapper.a' : 'wrapper.button';
  $iconName = 'heroicon-s-' . $icon;

  if ($icon !== null) {
      $classes = array_merge($classes, ['pl-4']);
  }

@endphp

<x-dynamic-component :component="$tag" :href="$href" {{ $attributes->class($classes) }}>
  @if ($icon !== null)
    <x-icon :name="$iconName" class="w-5 h-5 shrink-0" />
  @endif
  {{ $slot }}
</x-dynamic-component>
