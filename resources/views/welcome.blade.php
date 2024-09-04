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

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/favicons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ secure_url('/manifest.json') }}">

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pizza-orange">
        <div class="bg-pizza-orange h-2">
        </div>

        <div class="bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <div class="ninja5-logo">
                        <x-icon-logo-animated/>
                    </div>
                </div>
            </div>
        </div>

        @if(Cache::has('bitcoin_price'))
        <div class=" bg-neutral-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-center mx-auto max-w-3xl space-x-2 py-1 text-xs font-medium leading-6 text-neutral-400">
                    <dt>
                        BITCOIN PRICE
                    </dt>
                    <dd>
                        {{ Number::currency(Cache::get('bitcoin_price'), in: 'USD') }}
                    </dd>
                </div>
            </div>
        </div>
        @endif

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h2 class="mt-24 text-3xl text-white font-bold">
                    TEAM
                </h2>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <div class="flex flex-col md:flex-row mt-8 md:space-x-10 text-white">
                    @foreach(config('ninja5') as $key => $value)
                    <div class="flex flex-col mt-4 md:mt-0">
                        <a
                            href="https://x.com/{{ $key }}"
                            class="hover:text-orange-100"
                            target="_blank"
                        >
                            @svg('ninjas.'.$value['pizza_ninjas_number'], 'w-24 border rounded-lg')
                            <span class="mt-1 text-xs">
                                {{ $key }}
                            </span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h3 class="mt-24 text-3xl text-white font-bold">
                    FOLLOW US
                </h3>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
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

        <footer class="my-16 border-t border-orange-200 pt-8 sm:mt-20 lg:mt-24">
            <div class="flex flex-col md:flex-row items-center justify-center space-x-4 text-white">
                <div class="mt-4 flex space-x-4">
                    <p>Proudly hosted with</p>
                    <a
                        href="https://m.do.co/c/7a24c68b1e6d"
                        class="hover:text-orange-100"
                        target="_blank"
                        rel="noopener"
                    >
                        <span class="sr-only">Digital Ocean</span>
                        <x-icon-digitalocean class="h-6" />
                    </a>
                </div>
                <span class="mt-4 hidden md:inline"> | </span>
                <div class="mt-4 flex space-x-4">
                    <p>privacy-first insights with</p>
                    <a
                        href="https://usefathom.com/ref/FI15PB"
                        class="hover:text-orange-100"
                        target="_blank"
                        rel="noopener"
                    >
                        <span class="sr-only">Fathom Analytics</span>
                        <x-icon-fathom class="h-6" />
                    </a>
                </div>
            </div>
            <p class="mt-12 text-center text-xs leading-5 text-orange-100">
                &copy; 2024 {{ config('app.name') }}. All rights reserved.
            </p>
        </footer>

        <script>
        var wrapper = document.querySelector('.ninja5-logo svg')

        function draw() {
            wrapper.classList.add('active')
        }

        document.addEventListener("DOMContentLoaded", function(e) {
            setTimeout(draw, 150)
        })
        </script>
    </body>
</html>
