<div id="trading-view-charts" class="w-full h-96">

</div>

<div class="w-full flex mt-4 pr-4 lg:pr-12 justify-end text-gray-600">
    <span class="sr-only">Trading View Charts</span>
    <a
        href="https://www.tradingview.com"
        target="_blank"
        rel="noopener"
        class="text-white hover:text-gray-200"
    >
        <x-icon-tradingview class="h-4 lg:h-6" />
    </a>
</div>

@pushOnce('scripts')
    @vite('resources/js/chart.js')
@endPushOnce
