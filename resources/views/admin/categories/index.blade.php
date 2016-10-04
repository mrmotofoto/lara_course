@extends('layouts.admin')

@section('content')

    <h1>Index Categories</h1>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action' => 'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
            {{ csrf_field() }}
        </div>



        <div class="form-group">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
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
                        <td><a href="{{route('admin.users.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop