@extends('layout')
@section('content')
<h3>Enrollment Details</h3>
<table style="border:0px;">
   <tr>
      <td>
         <p><b class="lbl">ID : </b> {{$enrollment->id}}</p>
         <p><b class="lbl">Enroll NO : </b> {{$enrollment->enroll_no}}</p>
         <p><b class="lbl">Teacher ID : </b> {{$enrollment->teacher_id}}</p>
         <p><b class="lbl">Student ID : </b> {{$enrollment->student_id}}</p>
         <p><b class="lbl">Join date : </b> {{$enrollment->join_date}}</p>
         <p><b class="lbl">Fee : </b> {{$enrollment->fee}}</p>
      </td>
   </tr>
</table>
@endsection