@extends('layaouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>Edit Quote {{$quotes->id}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="/expense_quotes">Back</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="/expense_quotes/{{$quotes->id}}" method="POST">
            @csrf   
            @method('put')    
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type a title" value="{{$quotes->title}}">
                <button class="btn btn-primary" type="submit"> Submit</button>                
            </div>
        </form> 
    </div>
</div>
@endsection