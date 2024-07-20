<x-app.storybook.layout>
  <main>
    <button x-on:click="console.log('yep')">aaa</button>
    <x-button variant='filled' icon="academic-cap">Primary</x-button>
    <x-button variant='filled' color='secondary'>Secondary</x-button>
    <x-button variant='filled' color='tertiary'>Tertiary</x-button>
    <x-button variant='filled' href='/'>Primary Link</x-button>
    <x-button variant='filled' color='secondary' href='/'>Secondary Link</x-button>
    <x-button variant='filled' color='tertiary' href='/'>Tertiary Link</x-button>
    <x-button variant='outlined' icon="academic-cap">Primary</x-button>
    <x-button variant='outlined' color='secondary'>Secondary</x-button>
    <x-button variant='outlined' color='tertiary'>Tertiary</x-button>
    <x-button variant='outlined' href='/'>Primary Link</x-button>
    <x-button variant='outlined' color='secondary' href='/'>Secondary Link</x-button>
    <x-button variant='outlined' color='tertiary' href='/'>Tertiary Link</x-button>
    <x-button variant='text' icon="academic-cap">Primary</x-button>
    <x-button variant='text' color='secondary'>Secondary</x-button>
    <x-button variant='text' color='tertiary'>Tertiary</x-button>
    <x-button variant='text' href='/'>Primary Link</x-button>
    <x-button variant='text' color='secondary' href='/'>Secondary Link</x-button>
    <x-button variant='text' color='tertiary' href='/'>Tertiary Link</x-button>

    <x-button variant='extended-fab' href='/'>Primary Link</x-button>
    <x-button variant='extended-fab' color='secondary'>Secondary</x-button>
    <x-button variant='extended-fab' color='tertiary'>Tertiary</x-button>
    <x-button variant='extended-fab' color='tertiary' icon='academic-cap'>Tertiary</x-button>
    <div>
      <x-icon-button variant='filled' icon='academic-cap' />
      <x-icon-button variant='filled' icon='academic-cap' active />
    </div>
    <div>
      <x-icon-button variant='standard' icon='academic-cap' />
      <x-icon-button variant='standard' icon='academic-cap' active />
    </div>
  </main>
</x-app.storybook.layout>
