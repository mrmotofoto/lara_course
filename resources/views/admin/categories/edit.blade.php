@extends('layouts.admin')

@section('content')

    <h1>Edit Categories</h1>
    <div class="col-sm-6">
        {!! Form::model($category, ['method'=>'POST', 'action' => ['AdminCategoriesController@update', $category->id]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
            {{ csrf_field() }}
        </div>



        <div class="form-group">
            {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        
    </div>


@stop