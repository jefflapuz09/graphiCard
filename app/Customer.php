<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; 

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'emailAddress',
        'contactNumber',
        'street',
        'brgy',
        'city',
        'gender',
        'isActive',
    ];
}
