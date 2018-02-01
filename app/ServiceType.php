<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'service_subcategory';

    protected $fillable = [
        'name',
        'categoryId',
        'description',
        'price',
        'isActive'
    ];

    public function Ty(){
        return $this->hasMany('App\Post','typeId');
    }

    public function post(){
        return $this->hasMany('App\Post','typeId');
    }

    public function item(){
        return $this->hasMany('App\ServiceItem','subcategoryId');
    }

    public function Attributes(){
        return $this->hasMany('App\ItemAttributes','itemId');
    }
}
