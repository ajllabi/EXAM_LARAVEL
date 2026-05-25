@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
    <div>
        <h2 class="fw-bold mb-2">Courses</h2>
        <p class="text-muted mb-0">Manage all your courses in one place</p>
    </div>
    <a href="{{ route('courses.create')}}" class="btn btn-info">
        Create New Course
    </a>
</div>
@include('partials.success-message')
<div class="table-wrapper">

<table class="fl-table">

<thead><tr>

<th>Id</th>
<th>Title</th>
<th>Syllabus</th>
<th>Duration</th>
<th>Language</th>
<th>Show</th>
<th>Update</th>
<th>Delete</th>

</tr></thead>

<tbody>
    @forelse($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->title }}</td>
        <td>{{ $course->syllabus }}</td>
        <td>{{ $course->duration }}</td>
        <td>{{ $course->language }}</td>

        <td><a href="{{ url('/courses/' . $course->id)}}" class="btn btn-info">Show</a></td>
        <td><a href="{{ url('/courses/' . $course->id . '/edit') }}" class="btn btn-primary">Edit</a></td>
        <td>
        <form action="{{ url('/courses' . '/' . $course->id) }}" method="post" class="m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete ?')">Delete</button>
        </form>
        </td>
    </tr>
    @empty
    <td cospan="5" class=text-center>No Course found!</td>
    @endforelse
</tbody>

</table>
    
    <div class="d-flex justify-content-end mt-4">
        {{ $courses->links()}}
    </div>

</div>
@endsection
