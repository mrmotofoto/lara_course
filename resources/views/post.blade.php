@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
    <p>{{$post->body}}</p>

<hr>





@if(Session::has('comment_message'))
    {{session('comment_message')}}
@endif

@if(Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action' => 'PostCommentsController@store']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body', 'Post Comment') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>4])!!}
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endif
<hr>

<h2>Post Comments</h2>
@if(count($comments) > 0)
<!-- Posted Comments -->
    @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" width="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}

            @if(count($comment->replies) > 0)
                @foreach($comment->replies as $reply)
            {{--NESTED COMMENT--}}

                    <div id="nested-comments" class="media">
                        <a class="pull-left" href="#">
                            <img width="50" height="50" class="media-object" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>

                        <div class="comment-reply-container">
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                            <div class="comment-reply col-sm-6">
                                {!! Form::open(['method'=>'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                    {!! Form::label('body', 'Reply') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2])!!}
                                    {{ csrf_field() }}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                </div>
                @endforeach
            @endif
            @if(Session::has('reply_message'))
                {{session('reply_message')}}
            @endif
        </div>
    </div>

    @endforeach
@endif


@stop

@section('categories')
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @if($categories)
                    @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@stop