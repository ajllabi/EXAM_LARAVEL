@extends('layout')
@section('content')
<h3>Update Student </h3>
<form method="POST" action="{{route('students.update', $student->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name = "name" value="{{$student->name}}"/>
    </div>

    <div class="form-group">
      <label for = "name">Email: </label>
      <input type="text" class="form-control" name = "email" />
    </div>

    <div class="form-group">
        <label for = "name">Phone: </label>
        <input type="text" class="form-control" name = "phone" />
    </div>

    <div class="form-group">
        <label for = "name">Section: </label>
        <input type="text" class="form-control" name = "section" />
    </div>

    <div class="form-group">
      <label for ="name">Image: </label>
      <input type="file" class="form-control" name = "image" />
    </div>

    <button type="submit" class="btn btn-primary" >Save changes</button>


</form>

@endsection