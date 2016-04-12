<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //provide fillable columns so as to avoid mass assignment
    //id is not fillable
    protected $fillable = [
        'name'
    ];
}
