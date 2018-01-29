<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    protected $table = 'order_requests';

    protected $fillable = [
        'orderId',
        'orderDescription',
        'quantity',
        'itemName',
        'remarks',
        'design'
    ];
}
