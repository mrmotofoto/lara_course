@extends('layouts.admin')


@section('content')

  @if($posts)
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Category Id</th>
                <th>Photo Id</th>
                <th>Post Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                <td><img style="width:50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>

  @endif
@stop