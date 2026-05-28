@extends('layout')
@section('content')
<h3>Administrator Details</h3>
<table style="border:0px;">
   <tr>
      <td>
         <p><b class="lbl">ID : </b> {{$administrator->id}}</p>
         <p><b class="lbl">Full Name : </b> {{$administrator->fullname}}</p>
         <p><b class="lbl">User : </b> {{$administrator->user}}</p>
         <p><b class="lbl">phone : </b> {{$administrator->phone}}</p>
         <p><b class="lbl">Email : </b> {{$administrator->email}}</p>
         <p><b class="lbl">City : </b> {{$administrator->city}}</p>
      </td>
      <td style="padding-left:150px;">
        <img src="/image/{{$administrator->image}}" width="128" height="128">
      </td>
   </tr>
</table>
@endsection