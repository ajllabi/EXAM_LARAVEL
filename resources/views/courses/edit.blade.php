@extends('layout')
@section('content')
<h3>Update Course </h3>
<form method="POST" action="{{route('courses.update', $course->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $course->id }}" />
    <div class="form-group">
      <label for="name">Title:</label>
      <input type="text" class="form-control" name = "title" value="{{ $course->title }}" />
      @error('title')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Syllabus: </label>
      <input type="text" class="form-control" name = "syllabus" value="{{ $course->syllabus }}"/>
       @error('syllabus')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Duration: </label>
        <input type="text" class="form-control" name = "duration" value="{{ $course->duration }}"/>
        @error('duration')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Language: </label>
        <input type="text" class="form-control" name = "language" value="{{ $course->language }}"/>
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