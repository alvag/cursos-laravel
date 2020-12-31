<x-app-layout>
    <div class="courses">
        <section class="top bg-cover">
            <div class="container py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-white font-bold text-4xl">Lorem ipsum dolor sit amet, consectetur</h1>
                    <p class="text-white text-lg mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                        consequatur nostrum, pariatur possimus quasi ullam unde. </p>

                    @livewire('search')
                </div>
            </div>
        </section>

        @livewire('courses-index')
    </div>
</x-app-layout>
