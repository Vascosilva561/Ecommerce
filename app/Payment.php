<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['transaction_id', 'order_id', 'method', 'status', 'reference', 'receipt_image'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
