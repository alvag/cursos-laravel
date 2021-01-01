<div class="mb-4">
    {!! Form::label('title', 'Título del curso:') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course)
            <img id="picture" class="w-full h-64 object-cover object-center"
                 src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center"
                 src="https://images.pexels.com/photos/4497761/pexels-photo-4497761.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                 alt="">
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error fugiat
            sequi tempora
            voluptates? Eaque, praesentium, unde. Dolore dolorem doloremque eius error id mollitia nulla
            odio quis? Minus, odit, reiciendis!</p>

        {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
    </div>
</div>
