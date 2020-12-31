<?php

use App\Http\Livewire\InstructorCourse;
use Illuminate\Support\Facades\Route;


Route::redirect( '', 'instructor/cursos' );
Route::get( 'cursos', InstructorCourse::class )
    ->middleware( 'can:Leer cursos' )->name( 'courses.index' );
