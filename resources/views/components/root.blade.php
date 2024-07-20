<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'AImyMe' }}</title>
  @vite(['resources/css/app.css', 'resources/css/theme.css'])
  @vite(['resources/js/app.js'])
  @livewireStyles
  @stack('scripts')
</head>

<body class="light">
  {{ $slot }}
  @livewireScripts
  <script>
    document.addEventListener('alpine:init', () => {
      console.log('Alpine.js has been initialized');
    })
  </script>
</body>

</html>
