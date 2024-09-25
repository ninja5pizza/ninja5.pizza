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

    <x-price/>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <div class="mt-10">
                <x-search/>
            </div>
        </div>
    </div>

    <x-team/>

    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <h3 class="mt-24 text-3xl text-white font-bold">
                FOLLOW US
            </h3>
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
    </section>

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
