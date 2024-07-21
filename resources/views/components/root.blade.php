<!DOCTYPE html>
<html lang="ja">

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
</body>

</html>
