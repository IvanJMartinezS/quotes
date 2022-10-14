@extends('layaouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>Delete Quote {{$quotes->id}}</h1>
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
            @method('delete')    
            <div class="form-group">
                <button class="btn btn-primary" type="submit" onclick="return confirm('¿Realmente desea eliminar este recurso')"> Delete</button>
            </div>
        </form> 
    </div>
</div>
@endsection