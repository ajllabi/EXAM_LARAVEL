@extends('layout')
@section('content')
<h3>Teacher Details</h3>
<table style="border:0px;">
   <tr>
      <td>
         <p><b class="lbl">ID : </b> {{$teacher->id}}</p>
         <p><b class="lbl">Name : </b> {{$teacher->name}}</p>
         <p><b class="lbl">phone : </b> {{$teacher->phone}}</p>
         <p><b class="lbl">Email : </b> {{$teacher->email}}</p>
         <p><b class="lbl">Section : </b> {{$teacher->section}}</p>
      </td>
      <td style="padding-left:150px;">
        <img src="/image/{{$teacher->image}}" width="128" height="128">
      </td>
   </tr>
</table>
@endsection