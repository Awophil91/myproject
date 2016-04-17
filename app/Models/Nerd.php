<?php

namespace Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Nerd extends Model
{
    //provide fillable columns so as to avoid mass assignment
    //id and image column are not fillable
    protected $fillable = [
        'name', 'email', 'nerd_level'
    ];
}
