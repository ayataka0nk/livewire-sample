@props([
    'color' => 'primary',
    'href' => null,
    'icon' => null,
    'size' => 'medium',
    'floating' => false,
])

@php
  $tag = $href ? 'wrapper.a' : 'wrapper.button';
  $iconName = 'heroicon-o-' . $icon;

  $styles = [
      'relative',
      'inline-flex',
      'items-center',
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

      'text-sm',
      'font-semibold',
      'flex',
      'justify-center',
      'items-center',
  ];

  switch ($color) {
      case 'primary':
          $styles = array_merge($styles, [
              'bg-primary-container',
              'text-on-primary-container',
              'hover:after:bg-on-primary-container',
              'active:after:bg-on-primary-container',
              'focus-visible:after:bg-on-primary-container',
              'before:bg-on-primary-container',
          ]);
          break;
      case 'secondary':
          $styles = array_merge($styles, [
              'bg-secondary-container',
              'text-on-secondary-container',
              'hover:after:bg-on-secondary-container',
              'active:after:bg-on-secondary-container',
              'focus-visible:after:bg-on-secondary-container',
              'before:bg-on-secondary-container',
          ]);
          break;
      case 'tertiary':
          $styles = array_merge($styles, [
              'bg-tertiary-container',
              'text-on-tertiary-container',
              'hover:after:bg-on-tertiary-container',
              'active:after:bg-on-tertiary-container',
              'focus-visible:after:bg-on-tertiary-container',
              'before:bg-on-tertiary-container',
          ]);
          break;
  }

  if ($floating) {
      $styles = array_merge($styles, ['shadow-6dp']);
  }

  switch ($size) {
      case 'small':
          $styles = array_merge($styles, ['w-10', 'h-10', 'rounded-[12px]', 'before:rounded-[12px]']);
          break;
      case 'medium':
          $styles = array_merge($styles, ['w-14', 'h-14', 'rounded-[16px]', 'before:rounded-[16px]']);
          break;
      case 'large':
          $styles = array_merge($styles, ['w-24', 'h-24', 'rounded-[28px]', 'before:rounded-[28px]']);
          break;
  }

  $iconStyles = [];

  switch ($size) {
      case 'small':
          $iconStyles = ['w-6', 'h-6'];
          break;
      case 'medium':
          $iconStyles = ['w-6', 'h-6'];
          break;
      case 'large':
          $iconStyles = ['w-9', 'h-9'];
          break;
  }

@endphp

<x-dynamic-component :component="$tag" :href="$href" {{ $attributes->class($styles) }}>
  @if ($icon !== null)
    <x-icon :name="$iconName" @class($iconStyles) />
  @endif
</x-dynamic-component>
