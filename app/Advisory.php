<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    protected $table = 'advisories';

    protected $fillable = [
        'advisory'
    ];
}
