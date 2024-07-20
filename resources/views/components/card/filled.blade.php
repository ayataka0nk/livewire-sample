@php

  $onClick = $attributes->get('x-on:click');
  $href = $attributes->get('href');

  if ($onClick) {
      $component = 'wrapper.button';
  } elseif ($href) {
      $component = 'wrapper.a';
  } else {
      $component = 'wrapper.div';
  }

  if ($onClick || $href) {
      $hasAction = true;
  } else {
      $hasAction = false;
  }

  $styles = ['bg-surface-container', 'relative', 'overflow-hidden', 'text-on-surface', 'rounded-xl', 'p-4'];

  if ($hasAction) {
      $styles = array_merge($styles, [
          'block',
          'w-full',
          'text-left',
          'cursor-pointer',
          // hovered
          'hover:shadow-1dp',
          'hover:after:absolute',
          'hover:after:inset-0',
          'hover:after:full-width',
          'hover:after:opacity-8',
          'hover:after:bg-on-surface',
          // focused
          'focus-visible:after:absolute',
          'focus-visible:after:inset-0',
          'focus-visible:after:full-width',
          'focus-visible:after:opacity-10',
          'focus-visible:outline-none',
          'focus-visible:after:bg-on-surface',
          // pressed ripple
          'before:absolute',
          'before:inset-0',
          'before:full-width',
          'before:pointer-events-none',
          'before:rounded-xl',
          'before:bg-on-surface',
          'before:bg-no-repeat',
          'before:bg-center',
          'before:opacity-0',
          'before:transform',
          'before:scale-10',
          'before:[transition:transform_.3s,opacity_2s]',
          'active:before:scale-0',
          'active:before:opacity-10',
          'active:before:duration-0',
      ]);
  }

@endphp


<x-dynamic-component :component="$component" {{ $attributes->class($styles) }}>
  {{ $slot }}
</x-dynamic-component>
