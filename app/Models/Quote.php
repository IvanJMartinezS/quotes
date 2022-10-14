<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public function quoteSimples(){ 
        // 1 to *
        return $this->hasMany('App\Models\QuoteSimple');
    }
}
