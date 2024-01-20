<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnteringBlock extends Model
{
    protected $fillable = [
        'id_b',
        'f_name', 
        'l_name', 
        'national_code', 
        'company_name',
        'reason', 
        'date_block',
        'time_block',
        'date_cancel',
        'time_cancel',
        'isBlocked',
    ];
}
