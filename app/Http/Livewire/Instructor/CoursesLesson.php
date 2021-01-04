<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{

    public $section;
    public $lesson;
    public $platforms;
    public $lesson_name;
    public $lesson_url;
    public $lesson_platform_id = 1;

    protected $rules = [
        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => [ 'required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x' ]
    ];

    public function mount( Section $section )
    {
        $this->section = $section;
        $this->lesson = new Lesson();
        $this->platforms = Platform::all();
    }

    public function render()
    {
        return view( 'livewire.instructor.courses-lesson' );
    }

    public function store()
    {
        $rules = [
            'lesson_name' => 'required',
            'lesson_platform_id' => 'required',
            'lesson_url' => [ 'required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x' ]
        ];

        if ( $this->lesson_platform_id == 2 ) {
            $rules[ 'lesson_url' ] = [ 'required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/' ];

        }

        $this->validate( $rules );

        Lesson::create( [
            'name' => $this->lesson_name,
            'platform_id' => $this->lesson_platform_id,
            'url' => $this->lesson_url,
            'section_id' => $this->section->id
        ] );

        $this->reset( [ 'lesson_name', 'lesson_platform_id', 'lesson_url' ] );
        $this->section = Section::find( $this->section->id );
    }

    public function edit( Lesson $lesson )
    {
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    public function update()
    {
        if ( $this->lesson->platform_id == 2 ) {
            $this->rules[ 'lesson.url' ] = [ 'required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/' ];
        }
        $this->validate();

        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->section = Section::find( $this->section->id );
    }

    public function cancel()
    {
        $this->lesson = new Lesson();
    }

    public function destroy( Lesson $lesson )
    {
        $lesson->delete();
        $this->section = Section::find( $this->section->id );
    }
}
