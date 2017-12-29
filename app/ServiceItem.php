<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    protected $table = 'service_items';

    protected $fillable = [
        'name',
        'subcategoryId',
        'description',
        'isActive'
    ];

    public function Subcategory(){
        return $this->belongsTo('App\ServiceType','subcategoryId');
    }
}
