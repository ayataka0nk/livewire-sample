<x-navigation.drawer.container {{ $attributes }}>
  <x-navigation.drawer.header>AImyMe</x-navigation.drawer.header>
  <x-navigation.drawer.action-box>
    <x-button class="w-full" variant="extended-fab" icon="pencil">Dummy Action</x-button>
  </x-navigation.drawer.action-box>
  <x-navigation.drawer.items>
    <x-navigation.drawer.item href="/storybook/app-bar" icon="rectangle-group" label="AppBar" />
    <x-navigation.drawer.item href="/storybook/button" icon="rectangle-group" label="Button" />
    <x-navigation.drawer.item href="/storybook/card" icon="rectangle-group" label="Card" />
    <x-navigation.drawer.item href="/storybook/date-picker" icon="rectangle-group" label="DatePicker" />
    <x-navigation.drawer.item href="/storybook/dialog" icon="rectangle-group" label="Dialog" />
    <x-navigation.drawer.item href="/storybook/search" icon="rectangle-group" label="Search" />
    <x-navigation.drawer.item href="/storybook/text-field" icon="rectangle-group" label="TextField" />
    <x-navigation.drawer.item href="/storybook/time-picker" icon="rectangle-group" label="TimePicker" />
    <x-navigation.drawer.item href="/storybook/double-pane" icon="rectangle-group" label="DoublePane" />
  </x-navigation.drawer.items>
</x-navigation.drawer.container>
