<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>{{ isset($title) ? $title : "Sui Raya Kepulauan" }}</title>
</head>
<body>
  {{ $slot }}
</body>
</html>