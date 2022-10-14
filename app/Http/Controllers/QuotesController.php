<?php

namespace App\Http\Controllers;

use App\Mail\SummaryQuote;
use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;

class QuotesController extends Controller
{
    public function __contructor(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('quotes.index', ['quotes' => Quote::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required | min:3'
        ]);

        $report = new Quote();
        //'title' -> es el name del objeto que se envia desde el formulario
        //en este caso el input tipo text.
        $report->title = $validData['title'];
        $report->save();

        return redirect('expense_quotes');
    }

    /**
     * 
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.show', ['quotes'=>$quote]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Quote::findOrFail($id);
        return view('quotes.edit', [
            'quotes' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $report = Quote::findOrFail($id);
        $report->title = $request->get('title');
        $report->save();
        return redirect('expense_quotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $report = Quote::findOrFail($id);
        $report->delete();

        return redirect('expense_quotes');
    }

    /**
     * Confirm Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function confirmDelete($id){
        $report = Quote::findOrFail($id);
        
        return view('quotes.confirmDelete', [
            'quotes' => $report
        ]);
    }

    /**
     * Confirm Send Mail
     *
     * @param int $id
     * @return void
     */
    public function confirmSendMail($id){ //id of Quote
        
        $quotes = Quote::findOrFail($id);
         
        return view('quotes.confirmSendMail', ['quotes' => $quotes]);
    }

    /**
     * Send Mail to user
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function sendMail(Request $request, $id){

        $quotes = Quote::findOrFail($id);
        
        Mail::to($request->get('email'))->send(new SummaryQuote($quotes));
        
        return redirect('/expense_quotes/' . $id);
    }
}
