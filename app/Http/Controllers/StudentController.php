<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    // public function students(){
    //     return view('/students');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required',
        'section' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        $students = Student::create($validateData);

       return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {   
        return view('show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required',
        'section' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        $students = Student::update($validateData);

       return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student')->with('success', 'Student supprimer avec succèss');
    }
}
