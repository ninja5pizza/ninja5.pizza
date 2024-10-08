<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza Ninjas Collection | Bitcoin Ordinals</title>

        @vite('resources/css/app.css')

        <x-layout.head.opengraph/>
        <x-layout.head.twitter/>
        <x-layout.head.favicons/>

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pizza-orange">
        <x-navigation-bar/>

        <main class="flex my-12 justify-center border-b border-black">
            @foreach($inscriptions as $inscription)
                <a href="{{ route('inscription', $inscription) }}">
                    @svg('ninjas.'.$inscription->getInternalCollectionId(), 'w-56 h-56')
                </a>
            @endforeach
        </main>

        <section class="px-8">
            {{ $inscriptions->onEachSide(5)->links() }}
        </section>

        <x-layout.footer/>
    </body>
</html>
