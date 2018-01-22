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
}
