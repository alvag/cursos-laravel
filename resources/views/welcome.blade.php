<x-app-layout>
    <div class="welcome">

        <section class="top bg-cover">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-white font-bold text-4xl">Lorem ipsum dolor sit amet, consectetur</h1>
                    <p class="text-white text-lg mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                        consequatur nostrum, pariatur possimus quasi ullam unde. </p>

                    <!-- component -->
                    <!-- This is an example component -->
                    <div class="pt-2 relative mx-auto text-gray-600">
                        <input
                            class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search" name="search" placeholder="Search">
                        <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 absolute right-0 top-0 mt-2">
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-24">
            <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
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
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach($courses as $course)
                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">

                        <div class="px-6 py-4">
                            <h1 class="text-xl text-gray-700 mb-2 leading-6">
                                {{Str::limit($course->title, 40)}}
                            </h1>

                            <p class="text-gray-500 text-sm mb-2">Prof: {{$course->teacher->name}}</p>

                            <div class="flex ">
                                <ul class="flex">
                                    <li class="mr-1">
                                        <i class="fas fa-star text-sm text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-sm text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-sm text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-sm text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-sm text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                </ul>

                                <p class="text-sm text-gray-500 ml-auto">
                                    <i class="fas fa-users"></i>
                                    ({{$course->students_count}})
                                </p>
                            </div>

                            <a href="{{route('courses.show', $course)}}"
                               class="w-full mt-4 py-2 px-4 block text-center bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                Más información
                            </a>

                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>

