<div class="flex flex-col grow">
    <form
        class="flex items-center"
        action="{{ route('search') }}"
        method="POST"
    >
        @csrf
        <label for="ninja-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <x-icon-pizza-slice class="w-4 h-4 text-gray-500" aria-hidden="true"/>
            </div>
            <input
                type="text"
                id="ninja-search"
                name="query"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full ps-10 p-2.5"
                placeholder="Search Pizza Ninjas..."
                required
            />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-orange-700 rounded-lg border border-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-hidden focus:ring-orange-300">
            <x-icon-search class="w-4 h-4 text-neutral-100" aria-hidden="true"/>
            <span class="sr-only">Search</span>
        </button>
    </form>
    @error('query')
    <div class="max-w-sm mx-auto mt-2">
        <p class="text-red-900 font-medium text-xs">{{ $message }}</p>
    </div>
    @enderror
</div>
