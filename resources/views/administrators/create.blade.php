@extends('layout')
@section('content')
<h3>Add New Administrator</h3>

<form method="POST" action="{{route('administrators.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" name = "fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname')}}">
        @error('fullname')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">User: </label>
      <input type="text" class="form-control @error('user') is-invalid @enderror" value="{{ old('user')}}" name = "user" />
       @error('user')
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
        <label for = "name">city: </label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city')}}" name = "city" />
        @error('city')
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
    <button type="submit" class="btn btn-primary" >Add administrator</button>

</form>

@endsection