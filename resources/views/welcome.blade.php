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
        <div class="flex px-16 space-x-10 text-white">
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
            <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
        </div>
        <div class="flex mt-8 px-16 space-x-10 text-white">
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
            <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
        </div>
        <h2 class="px-16 mt-24 text-3xl text-white font-bold">
            TEAM
        </h2>
        <div class="flex px-16 mt-8 space-x-10 text-white">
            <div class="flex flex-col">
                <x-icon-user class="p-4 w-24 border rounded-lg"/>
                <span class="mt-1 text-xs">
                    <a href="https://x.com/OfficialKeptain" target="_blank">
                        @OfficialKeptain
                    </a>
                </span>
            </div>

            <div class="flex flex-col">
                <x-icon-user class="p-4 w-24 border rounded-lg"/>
                <span class="mt-1 text-xs">
                    <a href="https://x.com/KimiBoyNFT" target="_blank">
                        @KimiBoyNFT
                    </a>
                </span>
            </div>

            <div class="flex flex-col">
                <x-icon-user class="p-4 w-24 border rounded-lg"/>
                <span class="mt-1 text-xs">
                    <a href="https://x.com/sjen_anoubis" target="_blank">
                        @sjen_anoubis
                    </a>
                </span>
            </div>

            <div class="flex flex-col">
                <x-icon-user class="p-4 w-24 border rounded-lg"/>
                <span class="mt-1 text-xs">
                    <a href="https://x.com/mca_chef" target="_blank">
                        @mca_chef
                    </a>
                </span>
            </div>

            <div class="flex flex-col">
                <x-icon-user class="p-4 w-24 border rounded-lg"/>
                <span class="mt-1 text-xs">
                    <a href="https://x.com/mvdnbrk" target="_blank">
                        @mvdnbrk
                    </a>
                </span>
            </div>
        </div>
    </body>
</html>
