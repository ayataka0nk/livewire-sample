@props([
    'action' => null,
])

@php

  $items = [
      [
          'label' => 'DashBoard',
          'icon' => 'home',
          'href' => route('dashboard'),
      ],
  ];

@endphp


<div class="flex">
  <x-navigation.template appName="AImyMe" :items="$items" :action="$action" />
  <div class="flex-1">{{ $slot }}</div>
</div>
