@if($inscription->hasMoodzImages())
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
    <div class="mx-auto max-w-2xl">
        <div class="flex gap-x-2 justify-end">
            @foreach($inscription->getMoodzFullUrls() as $url)
            <img
                src="{{ $url }}"
                class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                alt="{{ $inscription->name }} animation by 0xmoodz"
            >
            @endforeach
        </div>
        <div class="flex px-2 justify-end text-orange-200 text-sm">
            <p class="mt-1">
                animation by
                <a
                    class="underline"
                    href="https://x.com/0xmoodz"
                    target="_blank"
                >@0xmoodz</a>
            </p>
        </div>
    </div>
</section>
@endif

@if($inscription->hasBtcLoongImages())
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
    <div class="mx-auto max-w-2xl">
        <div class="flex gap-x-2 justify-end">
            @foreach($inscription->getBtcLoongFullUrls() as $url)
            <img
                src="{{ $url }}"
                class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                alt="{{ $inscription->name }} art by loong.btc"
            >
            @endforeach
        </div>
        <div class="flex px-2 justify-end text-orange-200 text-sm">
            <p class="mt-1">
                art by
                <a
                    class="underline"
                    href="https://x.com/btc_loong"
                    target="_blank"
                >@btc_loong</a>
            </p>
        </div>
    </div>
</section>
@endif

@if($inscription->hasJasmineImages())
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
    <div class="mx-auto max-w-2xl">
        <div class="flex gap-x-2 justify-end">
            @foreach($inscription->getJasmineFullUrls() as $url)
            <img
                src="{{ $url }}"
                class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                alt="{{ $inscription->name }} art by jasmine"
            >
            @endforeach
        </div>
        <div class="flex px-2 justify-end text-orange-200 text-sm">
            <p class="mt-1">
                art by
                <a
                    class="underline"
                    href="https://x.com/itisjasminnee"
                    target="_blank"
                >@itisjasminnee</a>
            </p>
        </div>
    </div>
</section>
@endif

@if($inscription->hasMcaChefImages())
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-6">
    <div class="mx-auto max-w-2xl">
        <div class="flex gap-x-2 justify-end">
            @foreach($inscription->getMcaChefFullUrls() as $url)
            <img
                src="{{ $url }}"
                class=" w-full md:w-64 border border-2 border-orange-400 rounded-lg"
                alt="{{ $inscription->name }} art by mca_chef"
            >
            @endforeach
        </div>
        <div class="flex px-2 justify-end text-orange-200 text-sm">
            <p class="mt-1">
                art by
                <a
                    class="underline"
                    href="https://x.com/mca_chef"
                    target="_blank"
                >@mca_chef</a>
            </p>
        </div>
    </div>
</section>
@endif
