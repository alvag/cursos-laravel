<div>
    @foreach($section->lessons as $item)
        <article class="card mt-4">
            <div class="card-body">
                @if($lesson->id == $item->id)
                    <div>
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input type="text" class="form-input w-full" wire:model="lesson.name">
                        </div>

                        @error('lesson.name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma</label>
                            <select wire:model="lesson.platform_id"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input type="text" class="form-input w-full" wire:model="lesson.url">
                        </div>

                        @error('lesson.url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button class="btn btn-danger mr-2 px-2" wire:click="cancel">Cancelar</button>
                            <button class="btn btn-primary px-2" wire:click="update">Actualizar</button>
                        </div>
                    </div>
                @else
                    <header>
                        <h1>
                            <i class="far fa-play-circle text-blue-500 mr-1"></i>
                            Lección: {{$item->name}}
                        </h1>
                        <div>
                            <hr class="my-2">

                            <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                            <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}"
                                                          target="_blank">{{$item->url}}</a>
                            </p>

                            <div class="mt-2 ">
                                <button class="btn btn-primary text-sm px-2" wire:click="edit({{$item}})">Editar
                                </button>
                                <button class="btn btn-danger text-sm px-2" wire:click="destroy({{$item}})">Eliminar
                                </button>
                            </div>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-on:click="open = true" x-show="!open" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva lección
        </a>

        <article class="card mt-2" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input type="text" class="form-input w-full" wire:model="lesson_name">
                    </div>

                    @error('lesson_name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma</label>
                        <select wire:model="lesson_platform_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('lesson_platform_id')
                    <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL:</label>
                        <input type="text" class="form-input w-full" wire:model="lesson_url">
                    </div>

                    @error('lesson_url')
                    <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="btn btn-danger px-2 mr-2" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary px-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
