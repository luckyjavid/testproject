<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://kit.fontawesome.com/7136b3f749.js" crossorigin="anonymous"></script>
  {{-- Tailwind --}}
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  @livewireStyles
  <title>Todos</title>
</head>
<body>
  <x-alert></x-alert>
  <br />
  @yield('content')
  
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  @livewireScripts
</body>
</html>