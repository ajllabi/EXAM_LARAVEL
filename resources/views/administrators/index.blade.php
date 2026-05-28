@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
    <div>
        <h2 class="fw-bold mb-2">Administrators</h2>
        <p class="text-muted mb-0">Manage all your Administrators in one place</p>
    </div>
    <a href="{{ route('administrators.create')}}" class="btn btn-info">
        Create New Administrator
    </a>
</div>
@include('partials.success-message')
<div class="table-wrapper">

<table class="fl-table">

<thead><tr>

<th>Id</th>
<th>Full Name</th>
<th>User</th>
<th>Email</th>
<th>Phone</th>
<th>City</th>
<th>Image</th>
<th>Show</th>
<th>Update</th>
<th>Delete</th>

</tr></thead>

<tbody>
    @forelse($administrators as $administrator)
    <tr>
        <td>{{ $administrator->id }}</td>
        <td>{{ $administrator->fullname }}</td>
        <td>{{ $administrator->user }}</td>
        <td>{{ $administrator->email }}</td>
        <td>{{ $administrator->phone }}</td>
        <td>{{ $administrator->city }}</td>
        <td><img src="/image/{{ $administrator->image }}" width="96" height="96" /></td>
        <td><a href="{{ url('/administrators/' . $administrator->id)}}" class="btn btn-info">Show</a></td>
        <td><a href="{{ url('/administrators/' . $administrator->id . '/edit') }}" class="btn btn-primary">Edit</a></td>
        <td>
        <form action="{{ url('/administrators' . '/' . $administrator->id) }}" method="post" class="m-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete ?')">Delete</button>
        </form>
        </td>
    </tr>
    @empty
    <td cospan="5" class=text-center>No administrator found!</td>
    @endforelse
</tbody>

</table>
    
    <div class="d-flex justify-content-end mt-4">
        {{ $administrators->links()}}
    </div>

</div>
@endsection
