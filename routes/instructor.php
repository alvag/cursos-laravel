<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CourseCurriculum;
use Illuminate\Support\Facades\Route;

//use App\Http\Livewire\CoursesIndex;


Route::redirect( '', 'instructor/cursos' );

/*Route::get( 'cursos', CoursesIndex::class )
    ->middleware( 'can:Leer cursos' )->name( 'courses.index' );*/

Route::resource( 'cursos', CourseController::class )->names( 'courses' );

Route::get( 'cursos/{id}/curriculum', CourseCurriculum::class )->name( 'courses.curriculum' );
