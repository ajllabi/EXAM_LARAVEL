@extends('layout')
@section('content')
<h3>Update Enrollment </h3>
<form method="POST" action="{{route('enrollments.update', $enrollment->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $enrollment->id }}" />
    <div class="form-group">
      <label for="name">Enroll No:</label>
      <input type="text" class="form-control" name = "enroll_no" value="{{ $enrollment->enroll_no }}" />
      @error('enroll_no')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Teacher ID: </label>
      <input type="text" class="form-control" name = "teacher_id" value="{{ $enrollment->teacher_id }}"/>
       @error('teacher_id')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "student_id">Student ID: </label>
        <input type="text" class="form-control" name = "student_id" value="{{ $enrollment->student_id }}"/>
        @error('student_id')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "join_date">Join date: </label>
        <input type="text" class="form-control" name = "join_date" value="{{ $enrollment->join_date }}"/>
    </div>

    <div class="form-group">
      <label for ="fee">Fee: </label>
      <input type="text" class="form-control" name = "fee" value="{{ $enrollment->fee }}"/>
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