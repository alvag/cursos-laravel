<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search"
           class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded text-sm focus:outline-none"
           type="search" name="search" placeholder="Search">
    <button type="submit"
            class="py-2 px-4 bg-blue-500 text-white font-semibold rounded shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 absolute right-0 top-0 mt-2">
        Buscar
    </button>

    @if($search)
        <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg overflow-hidden z-10">
            @forelse($this->results as $result)

                <li class="leading-10 px-5 cursor-pointer hover:bg-gray-300">
                    <a href="{{route('courses.show', $result)}}">{{Str::limit($result->title, 50)}}</a>
                </li>

            @empty
                <li class="leading-10 px-5">
                    No hay ninguna coincidencia :(
                </li>

            @endforelse
        </ul>
    @endif
</form>
