@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>
        {!! Form::open(['method'=>'POST', 'action' => 'AdminUsersController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Full Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email Address') !!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('passwaord', 'Password') !!}
                {!! Form::email('password', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
@stop