@props([
    'label' => null,
    'icon' => null,
    'supportingText' => null,
    'error' => null,
    'readonly' => false,
    'multiline' => false,
    'placeholder' => null,
])

@php

  $iconStyles = [
      'absolute',
      'left-4',
      'top-4',
      'w-6',
      'h-6',
      'z-[1]',
      'pointer-events-none',
      'text-error' => $error,
      'text-on-surface-variant' => !$error,
      'peer-hover:text-on-surface' => !$error,
      'peer-focus:text-on-surface-variant' => !$error,
      'peer-focus:peer-hover:text-on-surface' => !$error,
  ];

  $labelStyles = [
      'absolute',
      'cursor-pointer',
      'pointer-events-none',
      '-top-2',
      'text-xs',
      'px-1',
      // 入力値無し
      'peer-placeholder-shown:top-3.5' => $placeholder === null,
      'peer-placeholder-shown:text-lg' => $placeholder === null,
      'peer-placeholder-shown:px-0' => $placeholder === null,

      // フォーカス
      'peer-focus:-top-2' => !$readonly,
      'peer-focus:left-4' => !$readonly,
      'peer-focus:text-xs' => !$readonly,
      'peer-focus:px-1' => !$readonly,

      // icon有無
      // 入力値無し
      'peer-placeholder-shown:left-13' => $icon,
      // 入力値あり
      'left-4' => $icon,
      // 入力値無し
      'peer-placeholder-shown:left-4' => !$icon,
      // 入力値あり
      'left-4' => !$icon,

      // 入力値無し
      'peer-placeholder-shown:text-error' => $error,
      // 入力値あり
      'text-error' => $error,

      // フォーカス
      'peer-focus:text-error' => $error && !$readonly,
      'peer-focus:text-primary' => $error && !$readonly,
      'bg-inherit',
  ];

  $inputStyles = [
      // 共通
      'peer',
      'w-full',
      'block',
      'p-4',
      'rounded',
      'bg-inherit',
      'outline-none',
      'placeholder-on-surface-variant',
      'shadow-[0_0_0_1px_black]',
      'focus:shadow-[0_0_0_2px_black]',
      'cursor-pointer',

      // エラー有無
      'shadow-error' => $error,
      'focus:shadow-error' => $error,
      'shadow-outline' => !$error,
      'hover:shadow-on-surface' => !$error,
      'focus:shadow-primary' => !$error,

      // アイコン有無
      'pl-13' => $icon,

      'resize-none' => $multiline,
  ];

  $supportingTextStyles = [
      'text-xs',
      'mt-1',
      'leading-none',
      'pl-4',
      'h-4',
      'text-error' => $error,
      'text-on-surface-variant' => !$error,
  ];

  $inputWrapperStyles = ['relative', 'mt-1', 'bg-inherit'];

  $iconName = 'heroicon-o-' . $icon;

@endphp

<div {{ $attributes->only('class')->class(['relative']) }} x-data="{
    autoresize(event) {
        if (typeof event?.target === 'undefined') {
            return
        }
        const textarea = event.target;
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
}" x-init="autoresize({ target: $refs.textarea })">
  @if ($icon)
    <x-icon :name="$iconName" @class($iconStyles) />
  @endif
  <div @class($inputWrapperStyles)>
    @if ($multiline)
      <textarea {{ $attributes->merge(['placeholder' => ''])->except('class') }} @class($inputStyles)
        x-on:input="autoresize" x-init="autoresize({ target: $el })" rows="1">{{ $attributes->get('value') }}</textarea>
    @else
      <input @class($inputStyles) placeholder='' :readonly="$readonly" {{ $attributes->except('class') }} />
    @endif

    @if ($label)
      <label @class($labelStyles) for='{{ $attributes->get('id') }}'>{{ $label }}</label>
    @endif
  </div>
  <p @class($supportingTextStyles)>
    @if ($error)
      {{ $error }}
    @else
      {{ $supportingText }}
    @endif
  </p>
</div>
