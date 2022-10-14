<div class="row">
    <div class="col">
        <h1>Expense Quote {{$quotes->id}}: {{$quotes->title}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Expenses </h2>
            <table class="tabla">
                @foreach($quotes->quoteSimples as $quote)
                    <tr>
                        <td>{{$quote->description}}</td>
                        <td>{{$quote->created_at}}</td>
                        <td>{{$quote->amount}}</td>
                    </tr>
                @endforeach

            </table>
    </div>
</div>