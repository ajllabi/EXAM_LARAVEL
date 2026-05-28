@extends('layout')
@section('content')
<h3>Update Administrator </h3>
<form method="POST" action="{{route('administrators.update', $administrator->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $administrator->id }}" />
    <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" name = "fullname" value="{{ $administrator->fullname }}" />
      @error('fullname')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
      <label for = "user">User: </label>
      <input type="text" class="form-control" name = "user" value="{{ $administrator->user }}"/>
       @error('user')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
      <label for = "name">Email: </label>
      <input type="text" class="form-control" name = "email" value="{{ $administrator->email }}"/>
       @error('email')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "name">Phone: </label>
        <input type="text" class="form-control" name = "phone" value="{{ $administrator->phone }}"/>
        @error('phone')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for = "city">City: </label>
        <input type="text" class="form-control" name = "city" value="{{ $administrator->city }}"/>
    </div>

    <div class="form-group">
      <label for ="name">Image: </label>
      <input type="file" class="form-control" name = "image" value="{{ $administrator->image }}"/>
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