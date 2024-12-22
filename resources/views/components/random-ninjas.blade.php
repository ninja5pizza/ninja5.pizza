<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl">
        <h2 class="flex justify-center md:justify-normal mt-24 text-3xl text-center text-white font-bold">
            RANDOM NINJAS
        </h2>
        <div class="flex flex-col md:flex-row mt-8 md:space-x-10 text-white">
        @foreach ($records as $record)
            @if ($record->fullSvgExists())
                <div class="flex flex-col mt-4 md:mt-0 items-center">
                    <a
                        href="{{ route('inscription', $record->inscription_id) }}"
                        class="hover:text-orange-100"
                    >
                        @svg('ninjas.'.$record->getInternalCollectionId(), 'w-96 md:w-24 border rounded-lg')
                    </a>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>
