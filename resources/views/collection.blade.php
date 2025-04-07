<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza Ninjas Collection on Bitcoin Ordinals | NINJA5</title>

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

        <main class="flex flex-col md:flex-row my-12">
            @foreach($inscriptions as $inscription)
                <span class="invisible">{{ $inscription->name }}</span>
                @if($ninja5->fullSvgExistsForNumber($inscription->getInternalCollectionId()))
                <div class="w-full flex justify-center border-b border-orange-700">
                    <a href="{{ route('inscription', $inscription) }}">
                        @svg('ninjas.'.$inscription->getInternalCollectionId(), [
                            'title' => $inscription->name,
                            'class' => 'w-96 h-96 md:w-80 md:h-80',
                        ])
                    </a>
                </div>
                @endif
            @endforeach
        </main>

        <section class="px-8">
            {{ $inscriptions->onEachSide(5)->links() }}
        </section>

        <div class="container mx-auto px-4 mt-8 mb-12 text-center">
            <select
                class="bg-white text-gray-900 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                onchange="window.location.href=this.value"
            >
                <option value="{{ route('collection') }}">All Ninjas</option>
                @foreach($tribes as $key => $value)
                    <option
                        value="{{ route('collection.tribe', $key) }}"
                        {{ ($current_tribe ?? '') === $key ? 'selected' : '' }}
                    >
                        {{ ucfirst($key) }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-layout.footer/>
    </body>
</html>
