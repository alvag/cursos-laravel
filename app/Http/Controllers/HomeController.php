<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where( 'status', '3' )->get();

        return $courses;

        return view( 'welcome' );
    }
}
