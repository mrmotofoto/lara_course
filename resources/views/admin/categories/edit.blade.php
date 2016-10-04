@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>
    <div class="col-sm-6">
        {!! Form::model($category, ['method'=>'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
            {{ csrf_field() }}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class' => 'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
        <div class=""form-group>
            {!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>




@stop