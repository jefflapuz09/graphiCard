<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
        'name',
        'description',
        'price',
        'isActive'
    ];

    public function Inclusion(){
        return $this->hasMany('App\PackageInclusion','packId');
    }
}
