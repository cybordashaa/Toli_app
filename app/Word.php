<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
    	'simple_word', 
    	'hard_word', 
    	'description'
    ];
}
