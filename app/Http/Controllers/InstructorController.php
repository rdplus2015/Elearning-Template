<?php

namespace App\Http\Controllers;

use App\category;
use App\course;
use Cocur\Slugify\Slugify;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    // middleware 

    public function __construct()
    {
        $this ->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('instructor.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new course();
        $slugify = new Slugify();

        $course -> title = $request ->input('title');
        $course -> subtitle = $request ->input('subtitle');
        $course -> slug = $slugify -> slugify($course -> title);
        $course -> description = $request ->input('description');
        $course -> category_id = $request ->input('category');
        $course -> user_id = Auth::user() -> id;
       
        $image = $request -> file('image');
        $imageFulllname = $image -> getClientOriginalName();
        $imageName = pathinfo( $imageFulllname, PATHINFO_FILENAME);
        $imageExtension = $image -> getClientOriginalExtension();
        
        $file = time().'_'.$imageName.'.'.$imageExtension;
        $image -> storeAs('public/courses/'. Auth::user()->id, $file);
        $course -> image = $file;

        $course -> save();
        return redirect() -> route('instructor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = category::all();
        $courses = course::find($id);
        return view('instructor.edit', [ 
        'course' => $courses,
        'categories' => $categories

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $slugify = new Slugify();

        $course -> title = $request ->input('title');
        $course -> subtitle = $request ->input('subtitle');
        $course -> slug = $slugify -> slugify($course -> title);
        $course -> description = $request ->input('description');
        $course -> category_id = $request ->input('category');
        
        if ($request ->file('image')) {
            $image = $request -> file('image');
            $imageFulllname = $image -> getClientOriginalName();
            $imageName = pathinfo( $imageFulllname, PATHINFO_FILENAME);
            $imageExtension = $image -> getClientOriginalExtension();
            
            $file = time().'_'.$imageName.'.'.$imageExtension;
            $image -> storeAs('public/courses/'. Auth::user()->id, $file);
            $course -> image = $file;
        }

        $course -> save();
        return redirect() -> route('instructor.index')-> with('success', 'vos modifications ont été apportées avec succès. !');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course -> delete();
        return redirect() -> route('instructor.index') ->with('success', 'le cours à été supprimé avec succès. !');
    }
}
