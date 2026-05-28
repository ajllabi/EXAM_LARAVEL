<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Courses = Course::all();
        $courses = Course::paginate(9);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'title' => 'required|max:32',
        'syllabus' => 'required|max:100',
        'duration' => 'required|max:30',
        'language' => 'required',
        ]);

        $Courses = Course::create($validateData);

       return redirect('/courses')->with('success', 'Course Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
       $validateData = $request->validate([
        'title' => 'required|max:32',
        'syllabus' => 'required|max:100',
        'duration' => 'required|max:30',
        'language' => 'required',
        ]);

        $course = Course::find($id);
        $course->update($validateData);

       return redirect('/courses')->with('success', 'Course updated successfully!');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('courses')->with('success', 'Course supprimer avec succèss');
    }
}
