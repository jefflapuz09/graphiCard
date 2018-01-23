<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageInclusion extends Model
{
    protected $table = 'package_inclusions';

    protected $fillable = [
        'packId',
        'itemId',
        'isActive',
        'qty'
    ];

    public function ItemPack(){
        return $this->belongsTo('App\ServiceItem','itemId');
    }

    public function Package(){
        return $this->belongsTo('App\Package','packId');
    }
}
