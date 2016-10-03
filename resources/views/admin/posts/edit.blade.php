@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>
    <div class="row">
        @include('includes.form_error')
    </div>
    {!! Form::model($post, [
        'method'=>'PATCH',
        'action' => ['AdminPostsController@update', $post->id],
        'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Post Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
        {{ csrf_field() }}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
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
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary col-sm-2']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open([
        'method'=>'DELETE',
        'action' => ['AdminPostsController@destroy', $post->id],
        'class' => 'pull-right'
        ]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop