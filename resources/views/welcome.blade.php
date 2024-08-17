<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-pizza-orange">
        <h1 class="p-16 text-3xl text-white font-bold">
            {{ config('app.name') }}
        </h1>

        <div class="flex p-16 space-x-10 text-white">
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
        </div>
        <div class="flex p-16 space-x-10 text-white">
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
        </div>
    </body>
</html>
