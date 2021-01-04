<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

class CourseCurriculum extends Component
{
    public $course;
    public $section;
    public $section_name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount( $id )
    {
        $this->course = Course::findOrFail( $id );
        $this->section = new Section();
    }

    public function render()
    {
        return view( 'livewire.instructor.course-curriculum' )->layout( 'layouts.instructor' );
    }

    public function edit( Section $section )
    {
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();
        $this->course = Course::findOrFail( $this->course->id );
    }

    public function store()
    {
        $this->validate( [
            'section_name' => 'required'
        ] );

        Section::create( [
            'name' => $this->section_name,
            'course_id' => $this->course->id
        ] );

        $this->reset( 'section_name' );

        $this->course = Course::findOrFail( $this->course->id );
    }

    public function destroy( Section $section )
    {
        $section->delete();
        $this->course = Course::findOrFail( $this->course->id );
    }
}
