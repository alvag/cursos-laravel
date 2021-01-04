<x-instructor-layout>

    <x-slot name="course">
        {{$course->id}}
    </x-slot>

    <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course->id], 'method' => 'put', 'files' => true]) !!}

    @include('instructor.courses.partials.form')

    <div class="flex justify-end">
        {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary px-2 cursor-pointer']) !!}
    </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

        <script src="{{asset('js/instructor/course/form.js')}}"></script>

    </x-slot>
</x-instructor-layout>
