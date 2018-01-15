<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SNS extends Model
{
    protected $table = 'sns';

    protected $fillable = [
        'facebook',
        'twitter',
        'messenger'
    ];
}
