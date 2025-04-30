<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($settings->title) ? $settings->title : config('app.name') }}</title> 
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/output.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
    <link rel="icon" type="image/png" href="{{ !empty($settings->light_icon) ? $settings->light_icon : "assets/images/logo/logo-short-white.png" }}">
  </head>
  <body>

    {{ $slot }}

    <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('/') }}assets/js/main.js"></script>
  </body>
</html>
