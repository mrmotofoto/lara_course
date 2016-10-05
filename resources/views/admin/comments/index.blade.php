@extends('layouts.admin')

@section('content')
<h1>Comments</h1>
 <table class="table">
     <thead>
       <tr>
         <th>Id</th>
         <th>Author</th>
         <th>Comments</th>
         <th>Email</th>
         <th>Post</th>

       </tr>
     </thead>
     <tbody>
     @if(count($comments) > 0)
       @foreach($comments as $comment)
         <tr>
           <td>{{$comment->id}}</td>
           <td>{{$comment->author}}</td>
           <td>{{$comment->body}}</td>
           <td>{{$comment->email}}</td>
           <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
           @if($comment->is_active === 1)
           <td>
            {!! Form::open(['method'=>'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" name="is_active" value="0">
                    <div class="form-group">
                        {!! Form::submit('Unapprove', ['class' => 'btn btn-success']) !!}
                    </div>
            {!! Form::close() !!}
            </td>
           @else
            <td>
             {!! Form::open(['method'=>'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
             <input type="hidden" name="is_active" value="1">
             <div class="form-group">
               {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}
             </div>
             {!! Form::close() !!}
            </td>
           @endif
           <td>
             {!! Form::open(['method'=>'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}

             <div class="form-group">
               {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             </div>
             {!! Form::close() !!}
           </td>

         </tr>
       @endforeach
       @else
        <h1 class="text-center">No Comments</h1>
     @endif
     </tbody>
   </table>

@stop