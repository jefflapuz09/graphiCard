<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_infos';

    protected $fillable = [
        'company_logo',
        'company_name',
        'street',
        'brgy',
        'city',
        'contactNumber',
        'emailAddress',
        'about',
        'description',
        'services_offered'
    ];
}
