<x-root>
  <div class="flex">
    <x-app.storybook.navigation.standard-drawer class="hidden lg:block bg-surface-container" />
    <x-app.storybook.navigation.rail class="hidden md:block lg:hidden bg-surface-container" />
    <x-app.storybook.navigation.modal-drawer />
    <div class="flex-1">{{ $slot }}</div>
  </div>
</x-root>
