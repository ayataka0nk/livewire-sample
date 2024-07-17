<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'AImyMe' }}</title>
  @vite('resources/css/app.css')
  @vite('resources/css/theme.css')
  @livewireStyles
</head>

<body class="light">
  {{ $slot }}
  @livewireScripts
</body>

</html>
