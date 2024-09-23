<div class="min-w-48 overflow-hidden rounded-lg bg-white shadow">
    <div class="bg-material-theme-ocean px-2 py-1 sm:px-4 text-sm text-neutral-100 font-medium">
        {{ $traitType }}
    </div>
    <div class="px-2 py-2">
        @svg('ninjamodule-'.$inscriptionId, 'w-42 h-42 object-cover rounded border border-neutral-300')
    </div>
    <div class="bg-neutral-100 px-2 py-1 text-sm text-neutral-700">
        <ul role="list" class="divide-y divide-neutral-300">
            <li class="py-2">{{ Number::fileSize($fileSize, precision: 2) }}</li>
            <li class="py-2">{{ $shortInscriptionId }}</li>
        </ul>
  </div>
</div>
