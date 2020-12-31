<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;

//use App\Http\Livewire\CoursesIndex;


Route::redirect( '', 'instructor/cursos' );

/*Route::get( 'cursos', CoursesIndex::class )
    ->middleware( 'can:Leer cursos' )->name( 'courses.index' );*/

Route::resource( 'cursos', CourseController::class )->names( 'courses' );
