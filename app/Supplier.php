<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nif',
        'address',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
