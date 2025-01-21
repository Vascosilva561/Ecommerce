<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'prod_id'];
}
