@extends('layouts.admin')



@section('content')
<h1>Users</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
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
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            {{--<td>{{$user->role}}</td>--}}
            {{--<td>{{$user->role->name}}</td>--}}
            {{--@if($user->role_id == 1)--}}
                {{--<td>Admin</td>--}}
                {{--@elseif($user->role_id == 2)--}}
                    {{--<td>Author</td>--}}
                    {{--@else--}}
                        {{--<td>Subscriber</td>--}}
            {{--@endif--}}

            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>
@stop