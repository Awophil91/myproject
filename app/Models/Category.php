<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/14/2016
 * Time: 7:41 PM
 */

namespace Manager\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model {

    //provide fillable columns so as to avoid mass assignment
    protected $fillable = [
        'name'
    ];


    // category __has_many__ products
    public function products()
    {
        return $this->hasMany('Manager\Models\Product');
    }
}