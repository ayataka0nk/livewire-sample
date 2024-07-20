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
  $appName = 'StoryBook';

@endphp


<x-root>
  <div class="flex">
    <x-navigation.template :appName="$appName" :items="$items" :action="$action" />
    <div class="flex-1">
      <x-app-bar.top class="md:hidden">{{ $appName }}</x-app-bar.top>
      <div>{{ $slot }}</div>
    </div>
  </div>
</x-root>
