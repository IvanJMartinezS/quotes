<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSimple extends Model
{
    use HasFactory;

    public function quote(){
        // * to 1
        return $this->belongsTo('App\Models\Quote');
    }

}
