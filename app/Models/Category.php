<?php


namespace Manager\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    //provide fillable columns so as to avoid mass assignment
    protected $fillable = [
        'name'
    ];

    // category __has_many__ products
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}