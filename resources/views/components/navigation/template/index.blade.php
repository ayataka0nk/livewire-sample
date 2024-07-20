@props([
    'appName' => null,
    'action' => null,
    'items' => [],
])


<x-navigation.template.standard-drawer {{ $attributes->class(['hidden lg:block bg-surface-container']) }}
  appName="{{ $appName }}" :action="$action" :items="$items" />
<x-navigation.template.rail {{ $attributes->class(['hidden md:block lg:hidden bg-surface-container']) }}
  appName="{{ $appName }}" :action="$action" :items="$items" />
<x-navigation.template.modal-drawer {{ $attributes }} appName="{{ $appName }}" :action="$action"
  :items="$items" />
