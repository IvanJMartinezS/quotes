@extends('layaouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>New Quote</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="/expense_quotes">Back</a>
    </div>
</div>
<div class="row">
    <div class="col">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/expense_quotes" method="POST">
            @csrf   
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type a title" value="{{old('title')}}">
                <button class="btn btn-primary" type="submit"> Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection