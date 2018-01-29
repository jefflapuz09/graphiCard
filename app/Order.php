<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customerId',
        'remarks',
        'receivedBy',
        'price',
        'status',
        'isActive'
    ];

    public function Request(){
        return $this->hasMany('App\OrderRequest','orderId');
    }

    public function Customer(){
        return $this->belongsTo('App\Customer','customerId');
    }
}
