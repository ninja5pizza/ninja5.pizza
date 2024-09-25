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
