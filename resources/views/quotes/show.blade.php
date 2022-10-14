@extends('layaouts.base')

@section('content')

<div class="row">
    <div class="col">
        <h1>Quote: {{$quotes->title}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="/expense_quotes">Back</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/expense_quotes/{{$quotes->id}}/confirmSendMail">Send mail</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>
            Details
        </h3>
        <table class="table">
            @foreach($quotes->quoteSimples as $quote)
                <tr>
                    <td>
                        {{$quote->description}}
                    </td>
                    <td>
                        {{$quote->created_at}}
                    </td>
                    <td>
                        {{$quote->amount}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/expense_quotes/{{$quotes->id}}/expenses/create">New Expense</a>
    </div>
</div>
@endsection