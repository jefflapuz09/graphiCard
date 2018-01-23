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

    public function RateItem(){
        return $this->hasMany('App\RatingItem','itemId');
    }

    public function PackageInclusion(){
        return $this->belongsTo('App\PackageInclusion','itemId');
    }

    
}
