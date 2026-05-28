<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = Administrator::paginate(9);
        return view('administrators.index', compact('administrators'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validateData = $request->validate([
        'fullname' => 'required|max:32',
        'user' => 'required|max:20',
        'email' => 'required|required|email|unique:users|max:100',
        'phone' => 'required|digits_between:8,10',
        'city' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        $administrators = Administrator::create($validateData);

        return redirect('/administrators')->with('success', 'Administrator Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $administrator = Administrator::findOrFail($id);
        return view('administrators.show', compact('administrator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administrator = Administrator::findOrFail($id);
        return view('administrators.edit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
        'fullname' => 'required|max:32',
        'user' => 'required|max:20',
        'email' => 'required|required|email|unique:users|max:100',
        'phone' => 'required|digits_between:8,10',
        'city' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;
        
        $administrator = Administrator::find($id);
        $administrator->update($validateData);
        return redirect('/administrators')->with('success', 'Administrator updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administrator = Administrator::findOrFail($id);
        $administrator->delete();
        return redirect('administrators')->with('success', 'Administrator successfully deleted');
    }
}
