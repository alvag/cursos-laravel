<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', HomeController::class )->name( 'home' );

Route::middleware( [ 'auth:sanctum', 'verified' ] )->get( '/dashboard', function () {
    return view( 'dashboard' );
} )->name( 'dashboard' );

Route::get( 'cursos', function () {
    return 'Lista de cursos';
} )->name( 'course.index' );

Route::get( 'cursos/{course}', function ( $course ) {
    return 'Información del curso';
} )->name( 'course.show' );
