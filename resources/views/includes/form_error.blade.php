@if(count($errors) > 0)
    <div class="alert alert-danger">
        <h2>You Got Errors!!!!</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif