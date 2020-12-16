<x-app-layout>
    <div class="welcome">

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

        <section class="mt-24">
            <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

            <div
                class="container py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover"
                             src="{{asset('img/home/bird-5370732_640.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta
                            dolore doloribus enim explicabo, itaque iure iusto labore libero nemo non</p>
                    </header>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover"
                             src="{{asset('img/home/flower-of-christmas-5799112_640.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta
                            dolore doloribus enim explicabo, itaque iure iusto labore libero nemo non</p>
                    </header>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover"
                             src="{{asset('img/home/river-5765785_640.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta
                            dolore doloribus enim explicabo, itaque iure iusto labore libero nemo non</p>
                    </header>
                </article>
                <article>
                    <figure>
                        <img class="rounded-xl h-36 w-full object-cover"
                             src="{{asset('img/home/sunset-5737120_640.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta
                            dolore doloribus enim explicabo, itaque iure iusto labore libero nemo non</p>
                    </header>
                </article>
            </div>
        </section>

        <section class="mt-24 bg-gray-700 py-12">
            <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
            <p class="text-center">Digígete al catálogo de cursos y fíltralos por categoría o nivel</p>

            <div class="flex justify-center mt-4">
                <a href="{{route('courses.index')}}"
                   class="bg-blue-500 text-white font-semibold rounded hover:bg-blue-700 py-2 px-4 ">
                    Catálogo de cursos
                </a>
            </div>
        </section>

        <section class="my-24">
            <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
            <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>

            <div
                class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach($courses as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>

