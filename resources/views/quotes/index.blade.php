@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Reports</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/expense_quotes/create">Create a new Quote</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table"> 
                @foreach ($quotes as $quote)
                    <tr>
                        <td><a href="/expense_quotes/{{$quote->id}}">{{$quote->title}}</a></td>
                        <td><a href="/expense_quotes/{{$quote->id}}/edit">Edit</a></td>
                        {{-- <td><a href="/expense_quotes/{{$quotes->id}}/confirmDelete">Delete</a></td>--}}
                        <td><form action="/expense_quotes/{{$quote->id}}" method="POST">
                            @csrf   
                            @method('delete')    
                                <button class="btn btn-primary" type="submit" onclick="return confirm('¿Realmente desea eliminar este recurso')"> Delete</button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection