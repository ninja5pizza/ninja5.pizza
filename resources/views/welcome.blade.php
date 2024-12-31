<x-layout.main>
    <div class="bg-gray-50 dark:bg-neutral-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <div id="ninja5-logo">
                    <x-icon-logo-animated/>
                </div>
            </div>
        </div>
    </div>

    <x-stats/>

    <x-chart/>

    <div class="mx-auto max-w-7xl px-0 sm:px-4 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <div class="mt-10 flex flex-col md:flex-row justify-center items-center mx-12">
                <x-search/>
                <a
                    href="{{ route('collection') }}"
                    class="mt-4 md:mt-0 pl-6 text-sm leading-6 text-white hover:text-orange-100"
                >
                    View collection <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>

    <x-pizza-pets/>

    <x-random-ninjas/>

    <x-team/>

    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <h3 class="flex justify-center md:justify-normal mt-24 text-3xl text-white font-bold">
                FOLLOW NINJA5
            </h3>
            <div class="flex justify-center md:justify-normal items-center mt-8 text-white">
                <a
                    href="https://x.com/ninja5_pizza"
                    class="hover:text-orange-100"
                    rel="noopener"
                    target="_blank"
                >
                    <x-icon-twitter-x class="w-8"/>
                </a>
                <a
                    href="https://discord.com/invite/PVpFta7tKC"
                    class="hover:text-orange-100"
                    rel="noopener"
                    target="_blank"
                >
                    <x-icon-discord class="ml-12 w-8"/>
                </a>
                <a
                    href="https://github.com/ninja5pizza"
                    class="hover:text-orange-100"
                    rel="noopener"
                    target="_blank"
                >
                    <x-icon-github class="ml-12 w-8"/>
                </a>
            </div>
        </div>
    </section>

    @pushOnce('scripts')
    <script>
    const wrapper = document.querySelector('#ninja5-logo svg')

    function draw() {
        wrapper.classList.add('active');
    }

    document.addEventListener("DOMContentLoaded", function(e) {
        setTimeout(draw, 150);
    })
    </script>
    @endPushOnce
</x-layout.main>
