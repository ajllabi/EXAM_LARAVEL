@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
    <div>
        <h2 class="fw-bold mb-2">Students</h2>
        <p class="text-muted mb-0">Manage all your students in one place</p>
    </div>
    <a href="{{ route('students.create')}}" class="btn btn-info">
        Create New Student
    </a>
</div>
<div class="table-wrapper">

<table class="fl-table">

<thead><tr>

<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Section</th>
<th>Image</th>
<th>Show</th>
<th>Update</th>
<th>Delete</th>

</tr></thead>

<tbody>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->section }}</td>
        <td><img src="/image/{{ $student->image }}" width="96" height="96" /></td>
        <td><a href="{{ route('student.show', $student->id)}}" class="btn btn-info">Show</a></td>
        <td><a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary">Edit</td>
        {{-- <td>
        <form action="{{ route('students.destroy', $student->)}}" method="post" class="m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
        onclick="return confirm('Voulez vous vraiment supprimer ?')">Delete</button>
        </form>
        </td> --}}

    </tr>
    @endforeach
</tbody>

</table>

</div>
@endsection
