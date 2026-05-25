@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
    <div>
        <h2 class="fw-bold mb-2">Enrollments</h2>
        <p class="text-muted mb-0">Manage all your Enrollments in one place</p>
    </div>
    <a href="{{ route('enrollments.create')}}" class="btn btn-info">
        Create New Enrollment
    </a>
</div>
@include('partials.success-message')
<div class="table-wrapper">

<table class="fl-table">

<thead><tr>

<th>Id</th>
<th>Enroll no</th>
<th>Teacher</th>
<th>Student</th>
<th>Join Date</th>
<th>Fee</th>
<th>Show</th>
<th>Update</th>
<th>Delete</th>

</tr></thead>

<tbody>
    @forelse($enrollments as $enrollment)
    <tr>
        
        <td>{{ $enrollment->id }}</td>
        <td>{{ $enrollment->enroll_no }}</td>
        <td>{{ $enrollment->teacher_id }}</td>
        <td>{{ $enrollment->student_id }}</td>
        <td>{{ $enrollment->join_date }}</td>
        <td>{{ $enrollment->fee }}</td>
        
        <td><a href="{{ url('/enrollments/' . $enrollment->id)}}" class="btn btn-info">Show</a></td>
        <td><a href="{{ url('/enrollments/' . $enrollment->id . '/edit') }}" class="btn btn-primary">Edit</a></td>
        <td>
        <form action="{{ url('/enrollments' . '/' . $enrollment->id) }}" method="post" class="m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete ?')">Delete</button>
        </form>
        </td>
    </tr>
    @empty
    <td cospan="5" class=text-center>No enrollment found!</td>
    @endforelse
</tbody>

</table>
    
    <div class="d-flex justify-content-end mt-4">
        {{ $enrollments->links()}}
    </div>

</div>
@endsection
