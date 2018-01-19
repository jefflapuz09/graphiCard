<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userEmployee extends Model
{
    protected $table = 'user_employees';

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'contactNumber',
        'street',
        'brgy',
        'city',
        'gender',
        'isActive'
    ];
}
