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
        'contactNumber',
        'street',
        'brgy',
        'city',
        'gender',
        'isActive'
    ];

    public function User(){
        return $this->hasMany('App\User','customerId');
    }
}
