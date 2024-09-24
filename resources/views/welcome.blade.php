<x-layout.main>
<div class="bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div class="ninja5-logo">
                    <x-icon-logo-animated/>
                </div>
            </div>
        </div>
    </div>

    @if(Cache::has('bitcoin_price') && Cache::has('ordinals_collection_stats_pizza-ninjas'))
    <div class="bg-neutral-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center mx-auto max-w-3xl space-x-2 py-1 text-xs font-medium leading-6 text-neutral-400">
                <div class="flex space-x-2">
                    <dt>
                        BITCOIN PRICE
                    </dt>
                    <dd>
                        {{ Number::currency(Cache::get('bitcoin_price'), in: 'USD') }}
                    </dd>
                </div>
                <div class="h-4 w-px bg-neutral-600"></div>
                <div class="flex space-x-2">
                    <dt>
                        <a href="https://magiceden.io/ordinals/marketplace/pizza-ninjas" target="_blank">
                            PIZZA NINJAS FLOOR PRICE
                        </a>
                    </dt>
                    <dd>
                        <a href="https://magiceden.io/ordinals/marketplace/pizza-ninjas" target="_blank">
                            {{ collect(Cache::get('ordinals_collection_stats_pizza-ninjas'))->get('floorPrice') / 1000000000 }} BTC
                        </a>
                    </dd>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <div class="mt-10">
                <x-search/>
            </div>
        </div>
    </div>

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
                        href="{{ route('profile', ['handle' => $key]) }}"
                        class="hover:text-orange-100"
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

    @pushOnce('scripts')
    <script>
    var wrapper = document.querySelector('.ninja5-logo svg')

    function draw() {
        wrapper.classList.add('active')
    }

    document.addEventListener("DOMContentLoaded", function(e) {
        setTimeout(draw, 150)
    })
    </script>
    @endPushOnce
</x-layout.main>
