<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorCourse extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where( 'user_id', auth()->user()->id )
            ->where( 'title', 'LIKE', '%' . $this->search . '%' )
            ->paginate( 8 );

        return view( 'livewire.instructor-course', compact( 'courses' ) );
    }

    public function clearPage()
    {
        $this->reset( 'page' );
    }
}
