<x-instructor-layout>
    <x-slot name="course">
        {{$course->id}}
    </x-slot>

    <div class="mb-8">
        @livewire('instructor.course-goals', ['course' => $course], key('goals-'.$course->id))
    </div>

    <div class="mb-8">
        @livewire('instructor.course-requirements', ['course' => $course], key('requirements-'.$course->id))
    </div>

    <div>
        @livewire('instructor.course-audience', ['course' => $course], key('audience-'.$course->id))
    </div>

</x-instructor-layout>
