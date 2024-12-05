@if (Route::currentRouteName() == 'home')
<div class="bg-pizza-orange h-2">
</div>
@else
<div class="bg-gray-50 border-b border-b-orange-900 shadow">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-2">
        <div class="mx-auto max-w-2xl">
            <div class="flex justify-between items-center text-orange-600 leading-6 text-sm">
                <div class="flex">
                    <a
                        class="hover:text-orange-400"
                        href="{{ route('home') }}"
                    >
                        <x-icon-home class="w-6 h-6"/>
                    </a>
                    @if(Route::currentRouteName() !== 'collection')
                    <a
                        class="pl-4 hover:text-orange-400"
                        href="{{ route('collection') }}"
                    >
                        collection
                    </a>
                    @endif
                </div>
                <a
                    class="hover:text-orange-400"
                    href="{{ route('home') }}"
                >
                    {{ config('app.name') }}
                </a>
            </div>
        </div>
    </nav>
</div>
@endif
