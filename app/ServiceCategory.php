<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $fillable = [
        'name',
        'description',
        'isActive'
    ];

    public function Type(){
        return $this->hasMany('App\ServiceType','categoryId');
    }

    public function Post(){
        return $this->hasMany('App\Post','categoryId');
    }
}
