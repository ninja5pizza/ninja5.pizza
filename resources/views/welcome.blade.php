<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')

        <meta property="og:url" content="{{ url()->full() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:description" content="We are the NINJA5 from the Pizza Ninjas Bootcamp 2024">
        <meta property="og:image" content="{{ asset('images/twitter-card-large.png') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:image" content="{{ asset('images/twitter-card-large.png') }}">

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pizza-orange">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <h1 class="mt-8 text-3xl text-white font-bold">
                    {{ config('app.name') }}
                </h1>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div class="mt-16 flex space-x-10 text-white">
                    <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
                    <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
                    <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
                    <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
                    <x-icon-ninja class="p-4 w-24 border rounded-lg"/>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div class="flex mt-8 space-x-10 text-white">
                    <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
                    <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
                    <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
                    <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
                    <x-icon-pizza-slice class="p-4 w-24 border rounded-lg"/>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <h2 class="mt-24 text-3xl text-white font-bold">
                    TEAM
                </h2>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div class="flex mt-8 space-x-10 text-white">
                    <div class="flex flex-col">
                        <a
                            href="https://x.com/billybitcoins"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            <x-ninjas-807 class="w-24 border rounded-lg"/>
                            <span class="mt-1 text-xs">
                                @billybitcoins
                            </span>
                        </a>
                    </div>

                    <div class="flex flex-col">
                        <a
                            href="https://x.com/KimiBoyNFT"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            <x-ninjas-110 class="w-24 border rounded-lg"/>
                            <span class="mt-1 text-xs">
                                @KimiBoyNFT
                            </span>
                        </a>
                    </div>

                    <div class="flex flex-col">
                        <a
                            href="https://x.com/sjen_anoubis"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            <x-ninjas-268 class="w-24 border rounded-lg"/>
                            <span class="mt-1 text-xs">
                                @sjen_anoubis
                            </span>
                        </a>
                    </div>

                    <div class="flex flex-col">
                        <a
                            href="https://x.com/mca_chef"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            <x-ninjas-962 class="w-24 border rounded-lg"/>
                            <span class="mt-1 text-xs">
                                @mca_chef
                            </span>
                        </a>
                    </div>

                    <div class="flex flex-col">
                        <a
                            href="https://x.com/mvdnbrk"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            <x-ninjas-874 class="w-24 border rounded-lg"/>
                            <span class="mt-1 text-xs">
                                @mvdnbrk
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <h3 class="mt-24 text-3xl text-white font-bold">
                    FOLLOW US
                </h3>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div class="flex mt-8 text-white">
                    <a
                        href="https://x.com/ninja5_pizza"
                        class="hover:text-orange-100"
                        target="_blank"
                    >
                        <x-icon-twitter-x class="w-8"/>
                    </a>
                </div>
            </div>
        </div>

        <footer class="my-16 border-t">

        </footer>
    </body>
</html>
