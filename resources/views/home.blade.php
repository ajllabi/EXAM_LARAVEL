@extends('layout')
@section('content')

<table border="0" style="width:800px; margin:50px;">
    <tr>
        <td>
            <a href="{{ url('/students')}}"><img src="img/student.jpg" width="175" height="175"></a> 
        </td>

        <td>
            <a href="{{ url('/teachers')}}"><img src="img/teacher.png" width="175" height="175"></a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{ url('/courses')}}"><img src="img/library.png" width="175" height="175"></a>
        </td>

        <td>
            <a href="{{ url('/maintenance')}}"><img src="img/administrator.png" width="175" height="175"></a>
        </td>
    </tr>
</table>

@endsection