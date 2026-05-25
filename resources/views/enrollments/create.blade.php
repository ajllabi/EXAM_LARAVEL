@extends('layout')
@section('content')
<h3>Add New Enrollment</h3>

<form method="POST" action="{{route('enrollments.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Enroll No:</label>
      <input type="text" name = "enroll_no" class="form-control @error('enroll_no') is-invalid @enderror" value="{{ old('enroll_no')}}">
        @error('enroll_no')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Teacher ID: </label>
      <input type="text" class="form-control @error('teacher_id') is-invalid @enderror" value="{{ old('teacher_id')}}" name = "teacher_id" />
       @error('teacher_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "student_id">Student ID: </label>
        <input type="text" class="form-control @error('student_id') is-invalid @enderror" value="{{ old('student_id')}}" name = "student_id" />
        @error('student_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for = "join_date">Join date: </label>
        <input type="text" class="form-control @error('join_date') is-invalid @enderror" value="{{ old('join_date')}}" name = "join_date" />
        @error('join_date')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for ="fee">Fee: </label>
      <input type="text" class="form-control @error('fee') is-invalid @enderror" value="{{ old('fee')}}" name = "fee" />
      @error('fee')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <br/><br/>
    <button type="submit" class="btn btn-primary" >Add Enrollment</button>

</form>

@endsection