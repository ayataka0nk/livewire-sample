<x-app.user.layout :action="[
    'label' => 'Label',
    'icon' => 'pencil',
    'href' => '/storybook/app-bar',
]">
  <div>
    <x-app-bar.top class="md:hidden">Title</x-app-bar.top>
    <h1>DashBoard</h1>
    <div>{{ $user->name }}</div>
  </div>
</x-app.user.layout>
