@extends('layout')
@section('content')
<h3>Add New Course</h3>

<form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Title:</label>
      <input type="text" name = "title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}">
        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Syllabus: </label>
      <input type="text" class="form-control @error('syllabus') is-invalid @enderror" value="{{ old('syllabus')}}" name = "syllabus" />
       @error('syllabus')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Duration: </label>
        <input type="text" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration')}}" name = "duration" />
        @error('duration')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Language: </label>
        <input type="text" class="form-control @error('language') is-invalid @enderror" value="{{ old('language')}}" name = "language" />
        @error('language')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <br/><br/>
    <button type="submit" class="btn btn-primary" >Add Course</button>

</form>

@endsection