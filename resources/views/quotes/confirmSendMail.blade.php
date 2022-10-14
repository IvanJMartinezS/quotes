@extends('layaouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>Send Quote</h1>
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
        <form action="/expense_quotes/{{$quotes->id}}/sendMail" method="POST">
            @csrf   
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Type email" value="{{old('email')}}">
                <button class="btn btn-primary" type="submit"> Send Mail</button>
            </div>
        </form>
    </div>
</div>
@endsection