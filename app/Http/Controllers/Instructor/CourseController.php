<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view( 'instructor.courses.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::pluck( 'name', 'id' );
        $levels = Level::pluck( 'name', 'id' );
        $prices = Price::pluck( 'name', 'id' );

        return view( 'instructor.courses.create', compact( 'categories', 'levels', 'prices' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View|Response
     */
    public function show( Course $course )
    {
        return view( 'instructor.courses.show', compact( 'course' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function edit( $id )
    {
        $course = Course::findOrFail( $id );
        $categories = Category::pluck( 'name', 'id' );
        $levels = Level::pluck( 'name', 'id' );
        $prices = Price::pluck( 'name', 'id' );
        return view( 'instructor.courses.edit', compact( 'course', 'categories', 'levels', 'prices' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return Response
     */
    public function update( Request $request, Course $course )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     */
    public function destroy( Course $course )
    {
        //
    }
}
