<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingItem extends Model
{
    protected $table = 'rating_items';

    protected $fillable = [
        'name',
        'customerId',
        'itemId',
        'rating',
        'description'
    ];

    public function Item(){
        return $this->belongsTo('App\ServiceItem','itemId');
    }

    public function Customer(){
        return $this->belongsTo('App\Customer','customerId');
    }
}
