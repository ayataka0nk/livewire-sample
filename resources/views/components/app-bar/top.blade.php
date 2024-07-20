<header {{ $attributes->class(['flex items-center h-14 min-w-full bg-surface-container']) }}>
  <x-icon-button icon="bars-3" data-action="navigation-open" />
  <div>{{ $slot }}</div>
</header>
