@props([
    'action' => null,
])

@php
  $items = [
      ['label' => 'AppBar', 'icon' => 'rectangle-group', 'href' => '/storybook/app-bar'],
      ['label' => 'Button', 'icon' => 'rectangle-group', 'href' => '/storybook/button'],
      ['label' => 'Card', 'icon' => 'rectangle-group', 'href' => '/storybook/card'],
      ['label' => 'DatePicker', 'icon' => 'rectangle-group', 'href' => '/storybook/date-picker'],
      ['label' => 'Dialog', 'icon' => 'rectangle-group', 'href' => '/storybook/dialog'],
      ['label' => 'Search', 'icon' => 'rectangle-group', 'href' => '/storybook/search'],
      ['label' => 'TextField', 'icon' => 'rectangle-group', 'href' => '/storybook/text-field'],
      ['label' => 'TimePicker', 'icon' => 'rectangle-group', 'href' => '/storybook/time-picker'],
      ['label' => 'DoublePane', 'icon' => 'rectangle-group', 'href' => '/storybook/double-pane'],
  ];

@endphp


<x-root>
  <div class="flex">
    <x-navigation.template appName="StoryBook" :items="$items" :action="$action" />
    <div class="flex-1">{{ $slot }}</div>
  </div>
</x-root>
