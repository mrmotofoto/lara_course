@extends('layouts.admin')



@section('content')
    <h1>Users</h1>


 <table class="table">
     <thead>
       <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Email</th>
       </tr>
     </thead>
@if($users)
    @foreach($users as $user)
     <tbody>

       <tr>
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
       </tr>
     </tbody>
    @endforeach
@endif
   </table>
@stop