@extends('layout')
@section('content')
<h3>Course Details</h3>
<table style="border:0px;">
   <tr>
      <td>
         <p><b class="lbl">ID : </b> {{$course->id}}</p>
         <p><b class="lbl">Title : </b> {{$course->title}}</p>
         <p><b class="lbl">Syllabus : </b> {{$course->syllabus}}</p>
         <p><b class="lbl">Duration : </b> {{$course->duration}}</p>
         <p><b class="lbl">Language : </b> {{$course->language}}</p>
      </td>
   </tr>
</table>
@endsection