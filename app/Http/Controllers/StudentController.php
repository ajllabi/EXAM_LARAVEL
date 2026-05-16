<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = Student::all();
        $students = Student::paginate(9);
        return view('students.index', compact('students'));
    }

    // public function students(){
    //     $students = Student::all();
    //     return view('students.index', compact('students'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
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

        $students = Student::create($validateData);

       return redirect('/students')->with('success', 'Student Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
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

        $student = Student::find($id);
        $student->update($validateData);

       return redirect('/students')->with('success', 'Student updated successfully!');
    } //->with('success', 'Student Created successfully!');

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('students')->with('success', 'Student supprimer avec succèss');
    }
}
