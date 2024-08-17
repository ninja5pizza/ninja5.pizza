<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-pizza-orange">
        <h1 class="p-24 text-3xl text-white font-bold">
            {{ config('app.name') }}
        </h1>
    </body>
</html>
