<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="main-template font-sans leading-none text-gray-700 antialiased">
        {{ $slot }}
        <x-sidebar/>
        <x-page-full-heading />
    </body>
</html>
