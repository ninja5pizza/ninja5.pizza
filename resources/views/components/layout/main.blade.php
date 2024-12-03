<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NINJA5 | PIZZA NINJAS</title>

        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @vite('resources/css/app.css')

        <x-layout.head.opengraph/>
        <x-layout.head.twitter/>
        <x-layout.head.favicons/>

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body id="app" class="bg-pizza-orange">
        <x-navigation-bar/>

        <main>
            {{ $slot }}
        </main>

        <x-layout.footer/>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
