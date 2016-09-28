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
            <th>Active</th>
            <th>Created</th>
            <th>Upated</th>
        </tr>
    </thead>
    @if($users)
        @foreach($users as $user)
    <tbody>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @if($user->role_id == 1)
                <td>Admin</td>
                @elseif($user->role_id == 2)
                    <td>Author</td>
                    @else
                        <td>Subscriber</td>
                    @endelse
                @endelseif
            @endif
            @if($user->is_active == 1)
                <td>Active</td>
                @else
                <td>InActive</td>
                @endelse
            @endif
            {{--<td>{{$user->role->name}}</td>--}}
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
    </tbody>
        @endforeach
    @endif
</table>
@stop