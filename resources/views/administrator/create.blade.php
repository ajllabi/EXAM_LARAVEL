@extends('layout')
@section('content')
<h3>Add New Teacher</h3>

<form method="POST" action="{{route('teachers.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name = "name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Email: </label>
      <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}" name = "email" />
       @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Phone: </label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')}}" name = "phone" />
        @error('phone')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Section: </label>
        <input type="text" class="form-control @error('section') is-invalid @enderror" value="{{ old('section')}}" name = "section" />
        @error('section')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for ="name">Image: </label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image')}}" name = "image" />
      @error('image')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <br/><br/>
    <button type="submit" class="btn btn-primary" >Add Teacher</button>

</form>

@endsection