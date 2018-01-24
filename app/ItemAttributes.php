<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttributes extends Model
{
    protected $table = 'item_attributes';

    protected $fillable = [
        'itemId',
        'attributeName',
        'choiceDescription',
        'isActive'
    ];

    public function Item(){
        return $this->belongsTo('App\ServiceType','itemId');
    }
}
