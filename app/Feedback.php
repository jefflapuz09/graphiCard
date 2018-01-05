<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'customerId',
        'image',
        'description',
        'rating',
        'isSelected',
        'isPublish',
        'isActive'
    ];

    public function Customer(){
        return $this->belongsTo('App\Customer','customerId');
    }
}
