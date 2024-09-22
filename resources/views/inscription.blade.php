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
        <meta property="og:image" content="{{ asset('images/240902-twitter-card-large.png') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:image" content="{{ asset('images/240902-twitter-card-large.png') }}">

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
        <main>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <h3 class="mt-24 text-3xl text-white font-bold">
                        {{ $inscription->name }}
                    </h3>
                </div>
            </div>
        </main>

        <section class="mt-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <div class="bg-material-theme-ocean rounded-lg shadow-lg overflow-auto">
                        <div class="flex justify-between gap-2 px-6 py-4 border-b border-slate-600">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            </div>
                            <div class="text-slate-400 text-sm font-semibold">
                                ninja.load
                            </div>
                        </div>
                        <div class="p-4 h-[calc(100%-40px)]">
                            <div class="language-json">
                                {!! json_encode($inscription->meta) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-12">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-4">
                @foreach(collect($inscription->meta) as $key => $value)
                    @if ($value['id'])
                        @svg('ninjamodule-'.$value['id'], 'w-42 border rounded-lg')
                    @endif
                @endforeach
                </div>
            </div>
        </section>

        <x-layout.footer/>

        @vite('resources/js/app.js')
    </body>
</html>
