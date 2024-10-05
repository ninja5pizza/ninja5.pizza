<div class="min-w-48 overflow-hidden rounded-lg bg-white shadow">
    <div class="bg-neutral-600 px-2 py-1 sm:px-4 text-sm text-neutral-100 font-medium">
        {{ $traitType }}
    </div>
    <div class="px-2 py-2">
        <x-ninja-svg-module
            :config="$ninja->getConfigForInscriptionId($inscriptionId)"
            :inscriptionId="$inscriptionId"
        />
    </div>
    <div class="bg-neutral-100 px-2 py-1 text-sm text-neutral-700">
        <ul role="list" class="divide-y divide-neutral-300">
            <li class="px-1 bg-neutral-200 py-2 rounded-t">
                <dl>
                    <dt class="font-semibold">
                        {{ Str::upper($trait->first()) }}
                    </dt>
                    <dd>
                        {{ $trait->last() }}
                    </dd>
                </dl>
            </li>
            <li class="px-1 py-2 text-neutral-600 font-semibold">
                {{ Number::fileSize($fileSize, precision: 2) }}
            </li>
            <li class="px-1 py-2">
                <a
                    class="underline hover:no-underline text-neutral-500"
                    href="{{ Str::of('https://ordiscan.com/inscription/')->append($inscriptionId) }}"
                    target="_blank"
                >
                    {{ $shortInscriptionId }}
                </a>
            </li>
        </ul>
  </div>
</div>
