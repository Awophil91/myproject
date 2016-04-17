<?php

namespace Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //provide fillable columns so as to avoid mass assignment
    protected $fillable = [
        'title', 'body'
    ];
}
