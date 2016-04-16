<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/14/2016
 * Time: 7:02 PM
 */

namespace Manager\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model{

    protected $fillable = [
        'name', 'category_id', 'price', 'description'
    ];


    public function category()
    {
        return $this->belongsTo('Manager\Models\Category');
    }
}