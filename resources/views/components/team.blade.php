<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col mx-auto max-w-2xl">
        <div class="">
        <h2 class="flex justify-center md:justify-normal mt-24 text-3xl text-white font-bold">
            PIZZA NINJAS CREATOR BOOTCAMP TEAM
        </h2>
        </div>
        <div class="flex flex-col md:flex-row mt-8 md:space-x-10 text-white">
            @foreach($ninja5->members->get('core') as $key => $value)
            <div class="flex flex-col mt-4 md:mt-0 items-center">
                <a
                    href="{{ route('profile', ['handle' => $key]) }}"
                    class="hover:text-orange-100"
                >
                    @if($ninja5->fullSvgExistsForNumber($value['pizza_ninjas_number']))
                        @svg('ninjas.'.$value['pizza_ninjas_number'], 'w-96 md:w-24 border rounded-lg')
                    @endif
                    <span class="mt-1 text-xs">
                        {{ $key }}
                    </span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
