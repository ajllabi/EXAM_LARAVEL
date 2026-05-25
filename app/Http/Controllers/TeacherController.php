<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Teachers = Teacher::all();
        $teachers = teacher::paginate(9);
        return view('teachers.index', compact('teachers'));
    }

    // public function Teachers(){
    //     $Teachers = Teacher::all();
    //     return view('Teachers.index', compact('Teachers'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'name' => 'required|max:32',
        'email' => 'required|required|email|unique:users|max:100',
        'phone' => 'required|digits_between:8,10',
        'section' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        $Teachers = Teacher::create($validateData);

       return redirect('/teachers')->with('success', 'Teacher Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validateData = $request->validate([
        'name' => 'required|max:32',
        'email' => 'required|required|email|unique:users|max:100',
        'phone' => 'required|digits_between:8,10',
        'section' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        $teacher = Teacher::find($id);
        $teacher->update($validateData);

       return redirect('/teachers')->with('success', 'Teacher updated successfully!');
    } //->with('success', 'Teacher Created successfully!');

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('teachers')->with('success', 'Teacher supprimer avec succèss');
    }
}
