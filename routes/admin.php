<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [ HomeController::class, 'index' ] );

Route::resource( 'roles', RoleController::class )->names( 'admin.roles' );
