@extends('layouts.admin')


@section('content')
    @if(Session::has('created_post'))
        <p class="bg-danger">{{session('created_post')}}</p>
    @endif
    @if(Session::has('updated_post'))
        <p class="bg-danger">{{session('updated_post')}}</p>
    @endif
    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif
    <h1>Posts</h1>
  @if($posts)
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Category</th>
                <th>Photo</th>
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
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><img style="width:50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body, 30)}}</td>
                <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>

  @endif
@stop