<footer class="my-16 border-t border-orange-200 pt-8 sm:mt-20 lg:mt-24">
    <div class="flex flex-col md:flex-row items-center justify-center space-x-4 text-white">
        <div class="mt-4 flex space-x-4">
            <p>Proudly hosted with</p>
            <a
                href="https://m.do.co/c/7a24c68b1e6d"
                class="hover:text-orange-100"
                target="_blank"
                rel="noopener"
            >
                <span class="sr-only">Digital Ocean</span>
                <x-icon-digitalocean class="h-6" />
            </a>
        </div>
        <span class="mt-4 hidden md:inline"> | </span>
        <div class="mt-4 flex space-x-4">
            <p>privacy-first insights with</p>
            <a
                href="https://usefathom.com/ref/FI15PB"
                class="hover:text-orange-100"
                target="_blank"
                rel="noopener"
            >
                <span class="sr-only">Fathom Analytics</span>
                <x-icon-fathom class="h-6" />
            </a>
        </div>
    </div>
    <p class="mt-12 text-center text-xs leading-5 text-orange-100">
        &copy; 2024 {{ config('app.name') }}. All rights reserved.
    </p>
</footer>
