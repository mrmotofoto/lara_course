@extends('layouts.admin')


@section('content')
    @include('includes.form_error')
    <h1>CREATE POST</h1>

    {!! Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store', 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Post Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Choose Image:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control',])!!}

            </div>
            <br>
            <div class="form-group">
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
    {!! Form::close() !!}

@stop