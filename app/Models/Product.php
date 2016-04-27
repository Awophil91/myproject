<?php


namespace Manager\Models;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = [
        'name', 'category_id', 'price', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}