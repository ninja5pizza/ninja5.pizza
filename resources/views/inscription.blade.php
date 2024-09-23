<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')

        <x-layout.head.opengraph/>
        <x-layout.head.twitter/>
        <x-layout.head.favicons/>

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pizza-orange">
        <main>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <div class="mt-24 flex flex-col md:flex-row justify-between">
                        <h3 class="text-3xl text-white font-bold">
                            {{ $inscription->name }}
                        </h3>
                        @if($inscription->fullSvgExists())
                            @svg('ninjas.'.$inscription->getInternalCollectionId(), 'mt-4 md:mt-0 w-48 border rounded-lg')
                        @endif
                    </div>
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
                            <div class="text-neutral-400 text-sm font-semibold">
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

        <section class="mt-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <h4 class="text-xl text-white text-center">
                        {{ $inscription->name }} has {{ $inscription->getSvgComponentCount() }} components with a total file size of {{ Number::fileSize($inscription->getSvgComponentsTotalFileSize(), precision: 2) }}
                    </h4>
                </div>
            </div>
        </section>

        <section class="mt-6">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                @foreach($inscription->getSvgComponentsInscriptionIds() as $item)
                    <x-svg-component-card
                        :inscriptionId="$item"
                        :shortInscriptionId="$inscription->getShortenedInscriptionIdFor($item)"
                        :traitType="$inscription->getTraitTypeForInscriptionId($item)"
                        :trait="$inscription->getTraitForInscriptionId($item)"
                        :fileSize="$inscription->getSvgComponentFileSizeForId($item)"
                    />
                @endforeach
                </div>
            </div>
        </section>

        <x-layout.footer/>

        @vite('resources/js/app.js')
    </body>
</html>
