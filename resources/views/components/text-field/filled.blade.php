@props([
    'label' => null,
    'icon' => null,
    'supportingText' => null,
    'error' => null,
    'readonly' => false,
    'multiline' => false,
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
  ];

  $labelStyles = [
      // 共通
      'absolute',
      'cursor-pointer',
      'pointer-events-none',
      // 入力値無し
      'peer-placeholder-shown:top-3.5',
      'peer-placeholder-shown:text-lg',
      // 入力値あり
      'top-2',
      'text-xs',

      // フォーカス
      'peer-focus:top-2' => !$readonly,
      'peer-focus:text-xs' => !$readonly,

      // 入力値無し
      'peer-placeholder-shown:left-13' => $icon,
      'peer-placeholder-shown:left-4' => !$icon,
      // 入力値あり
      'left-13' => $icon,
      'left-4' => !$icon,

      // エラーあり
      'peer-placeholder-shown:text-error' => $error,
      'text-error' => $error,

      // エラーあり、読み込み専用でない
      'peer-focus:text-error' => $error && !$readonly,

      // エラーなし
      // 入力値無し
      'peer-placeholder-shown:text-on-surface-variant' => !$error,
      // 入力値あり
      'text-on-surface-variant' => !$error,
      // 読み取り専用でない
      'peer-focus:text-primary' => !$error && !$readonly,
  ];

  $inputStyles = [
      // TODO 背景色の任意指定
      'bg-surface-container-highest',
      'peer',
      'w-full',
      'block',
      'pr-4',
      'pt-6',
      'pb-2',
      'rounded-t',
      'outline-none',
      'placeholder-transparent',
      'shadow-underline-thin',
      'line-height-0',
      'cursor-pointer',

      // 変更可否
      'focus:shadow-underline-thick' => !$readonly,

      // エラー有無
      'shadow-error' => $error,
      'focus:shadow-error' => $error,
      'shadow-primary' => !$error,
      'focus:shadow-primary' => !$error,

      // アイコン有無
      'pl-13' => $icon,
      'pl-4' => !$icon,

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

  $inputWrapperStyles = [
      'hover:after:full-width',
      'relative',
      'hover:after:pointer-events-none',
      'hover:after:absolute',
      'hover:after:inset-0',
      'hover:after:bg-on-surface',
      'hover:after:opacity-8',
  ];

  $iconName = 'heroicon-o-' . $icon;

@endphp


<div class='relative ' {{ $attributes->only('class') }} x-data="{
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
