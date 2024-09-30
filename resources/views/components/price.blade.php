@if(Cache::has('bitcoin_price') && Cache::has('ordinals_collection_stats_pizza-ninjas'))
<section class="bg-neutral-900 dark:bg-neutral-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center mx-auto max-w-3xl space-x-2 py-1 text-xs font-medium leading-6 text-neutral-400 dark:text-neutral-600">
            <div class="flex space-x-2">
                <dt>
                    BITCOIN PRICE
                </dt>
                <dd>
                    {{ Number::currency(Cache::get('bitcoin_price'), in: 'USD') }}
                </dd>
            </div>
            <div class="hidden md:block h-4 w-px bg-neutral-600"></div>
            <div class="flex space-x-2">
                <dt>
                    <a href="https://magiceden.io/ordinals/marketplace/pizza-ninjas" target="_blank">
                        PIZZA NINJAS FLOOR PRICE
                    </a>
                </dt>
                <dd>
                    <a href="https://magiceden.io/ordinals/marketplace/pizza-ninjas" target="_blank">
                        {{ collect(Cache::get('ordinals_collection_stats_pizza-ninjas'))->get('floorPrice') / 100000000 }} BTC
                        / {{ Number::currency(Cache::get('bitcoin_price') * collect(Cache::get('ordinals_collection_stats_pizza-ninjas'))->get('floorPrice') / 100000000, in: 'USD') }}
                    </a>
                </dd>
            </div>
        </div>
    </div>
</section>
@endif
