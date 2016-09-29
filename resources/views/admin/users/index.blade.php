@extends('layouts.admin')



@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-danger">{{session('created_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-danger">{{session('updated_user')}}</p>
    @endif

<h1>Users</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Upated</th>
        </tr>
    </thead>

    <tbody>

   <?php
//        use App\User;
//        $test_user = User::find(2);
//        echo '<h2>' . $test_user->role->id . ' ' . $test_user->role->name . '<h2>';
   ?>
    @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img style="width:50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>
@stop