<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $inscription->name }} | {{ config('app.name') }}</title>

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
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <div class="mt-24 flex flex-col md:flex-row justify-between">
                        <div class="flex flex-col">
                            <div class="flex gap-2">
                                <h3 class="text-3xl text-orange-100 font-bold">
                                    {{ $inscription->name }}
                                </h3>
                                @if($ninja5->isCoreMemberForInscriptionId($inscription->inscription_id))
                                    <div class="text-orange-200">
                                        <x-icon-verified class="w-4"/>
                                    </div>
                                @endif
                            </div>
                            @if($ninja5->getTwitterHandleForInscriprionId($inscription->inscription_id))
                            <div class="mt-4">
                                <span class="text-xl text-orange-50 font-bold">
                                    {{ $ninja5->getTwitterNameForInscriprionId($inscription->inscription_id) }}
                                </span>
                                <a
                                    class="mt-1 flex items-center text-orange-200 hover:text-white"
                                    href="{{ Str::of($ninja5->getTwitterHandleForInscriprionId($inscription->inscription_id))->prepend('https://x.com/') }}"
                                    target="_blank"
                                >
                                    <x-icon-twitter-x class="w-6 h-6 pr-2"/>
                                    <span>{{ Str::of('@')->append($ninja5->getTwitterHandleForInscriprionId($inscription->inscription_id)) }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            @if($inscription->fullSvgExists())
                            @svg(
                                'ninjas.'.$inscription->getInternalCollectionId(),
                                'mt-4 md:mt-0 w-full md:w-64 border border-2 border-orange-400 rounded-lg'
                            )
                            <a
                                href="{{ route('download-svg', $inscription) }}"
                                class="mt-1 text-center rounded-md bg-white px-2.5 py-1.5 text-sm font-medium text-neutral-500 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-orange-200 hover:text-neutral-600"
                            >
                                Download SVG
                            </a>
                            @endif
                            <share-ninja :initial-url="'{{ Str::of('https://pizza.ninja/')->append($inscription->getInternalCollectionId()) }}'"></share-ninja>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @if($inscription->hasMoodzImages())
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
            <div class="mx-auto max-w-2xl">
                <div class="flex gap-x-2 justify-end">
                    @foreach($inscription->getMoodzFullUrls() as $url)
                    <img
                        src="{{ $url }}"
                        class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                        alt="{{ $inscription->name }} animation by 0xmoodz"
                    >
                    @endforeach
                </div>
                <div class="flex px-2 justify-end text-orange-200 text-sm">
                    <p class="mt-1">
                        animation by
                        <a
                            class="underline"
                            href="https://x.com/0xmoodz"
                            target="_blank"
                        >@0xmoodz</a>
                    </p>
                </div>
            </div>
        </section>
        @endif

        @if($inscription->hasBtcLoongImages())
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
            <div class="mx-auto max-w-2xl">
                <div class="flex gap-x-2 justify-end">
                    @foreach($inscription->getBtcLoongFullUrls() as $url)
                    <img
                        src="{{ $url }}"
                        class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                        alt="{{ $inscription->name }} art by loong.btc"
                    >
                    @endforeach
                </div>
                <div class="flex px-2 justify-end text-orange-200 text-sm">
                    <p class="mt-1">
                        art by
                        <a
                            class="underline"
                            href="https://x.com/btc_loong"
                            target="_blank"
                        >@btc_loong</a>
                    </p>
                </div>
            </div>
        </section>
        @endif

        @if($inscription->hasJasmineImages())
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
            <div class="mx-auto max-w-2xl">
                <div class="flex gap-x-2 justify-end">
                    @foreach($inscription->getJasmineFullUrls() as $url)
                    <img
                        src="{{ $url }}"
                        class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                        alt="{{ $inscription->name }} art by jasmine"
                    >
                    @endforeach
                </div>
                <div class="flex px-2 justify-end text-orange-200 text-sm">
                    <p class="mt-1">
                        art by
                        <a
                            class="underline"
                            href="https://x.com/itisjasminnee"
                            target="_blank"
                        >@itisjasminnee</a>
                    </p>
                </div>
            </div>
        </section>
        @endif

        <section class="mt-32 bg-material-theme-ocean pt-16 pb-24 shadow-lg">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                @foreach($inscription->getSvgComponentsInscriptionIds() as $item)
                    <x-svg-component-card
                        :ninja="$inscription"
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

        <section class="mt-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <h4 class="pb-6 text-orange-100 font-bold">
                        {{ $inscription->name }} has {{ $inscription->getSvgComponentCount() }} components with a total file size of {{ Number::fileSize($inscription->getSvgComponentsTotalFileSize(), precision: 2) }}
                    </h4>
                    <p class="pb-4 text-orange-200">
                        A Pizza Ninja is an HTML file,<br>
                        a script inside that HTML file is called to load its elements dynamically.<br>
                    </p>
                    <p class="pb-6 text-orange-200">
                        For {{ $inscription->name }} this <code class="text-sm">Ninja.load()</code> function is called:
                    </p>
                    <div class="bg-material-theme-ocean rounded-lg shadow-lg overflow-auto">
                        <div class="flex justify-between gap-2 px-6 py-4 border-b border-slate-600">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            </div>
                            <div class="text-neutral-400 text-sm font-semibold">
                                Ninja.load()
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

        <x-layout.footer/>

        @vite('resources/js/app.js')
    </body>
</html>
