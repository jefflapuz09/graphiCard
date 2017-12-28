<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'categoryId',
        'typeId',
        'userId',
        'details',
        'image',
        'isDraft',
        'isActive',
        'isFeatured'
    ];

    public function ServiceCategory(){
        return $this->belongsTo('App\ServiceCategory','categoryId');
    }

    public function ServiceType(){
        return $this->belongsTo('App\ServiceType','typeId');
    }

    public function User(){
        return $this->belongsTo('App\User','userId');
    }
}
