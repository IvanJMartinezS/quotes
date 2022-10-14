<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Quote;

class SummaryQuote extends Mailable
{
    use Queueable, SerializesModels;

    private $quotes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /* public function __construct($expenseQuote)
    {
        $this->quotes = Quote::findOrFail($expenseQuote);

    } */

    //Revisar con model binding
    public function __construct(Quote $expenseQuote)
    {
        $this->quotes = $expenseQuote;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.expenseQuote', ['quotes' => $this->quotes]);
    }
}
