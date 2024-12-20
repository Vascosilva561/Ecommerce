<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
    	return $this->belongsToMany('App\Product');
    }

     protected $table='categories';
    protected $primaryKey='id';
    protected $fillable = ['name', 'slug', 'image', ];
}
