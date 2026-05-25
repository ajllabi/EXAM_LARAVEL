@extends('layout')
@section('content')
<h3>Update Teacher </h3>
<form method="POST" action="{{route('teachers.update', $teacher->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $teacher->id }}" />
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name = "name" value="{{ $teacher->name }}" />
      @error('name')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Email: </label>
      <input type="text" class="form-control" name = "email" value="{{ $teacher->email }}"/>
       @error('email')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Phone: </label>
        <input type="text" class="form-control" name = "phone" value="{{ $teacher->phone }}"/>
        @error('phone')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Section: </label>
        <input type="text" class="form-control" name = "section" value="{{ $teacher->section }}"/>
    </div>

    <div class="form-group">
      <label for ="name">Image: </label>
      <input type="file" class="form-control" name = "image" value="{{ $teacher->image }}"/>
    </div>
    <br/> <br/>
    <button type="submit" class="btn btn-primary" >Validate Changes</button>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

@endsection