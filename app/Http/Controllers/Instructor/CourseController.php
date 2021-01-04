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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
     * @return RedirectResponse
     */
    public function store( Request $request )
    {
        $request->validate( [
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ] );

        $course = Course::create( $request->all() );

        if ( $request->file( 'file' ) ) {
            $url = Storage::put( 'courses', $request->file( 'file' ) );

            $course->image()->create( [
                'url' => $url
            ] );
        }

        return redirect()->route( 'instructor.courses.edit', $course->id );
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
     * @param $id
     * @return RedirectResponse
     */
    public function update( Request $request, $id ): RedirectResponse
    {
        $course = Course::findOrFail( $id );

        $request->validate( [
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ] );

        $course->update( $request->all() );

        if ( $request->file( 'file' ) ) {
            $url = Storage::put( 'courses', $request->file( 'file' ) );

            if ( $course->image ) {
                Storage::delete( $course->image->url );

                $course->image()->update( [
                    'url' => $url
                ] );
            } else {
                $course->image()->create( [
                    'url' => $url
                ] );
            }


        }

        return redirect()->route( 'instructor.courses.edit', $course->id );

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
