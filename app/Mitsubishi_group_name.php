<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitsubishi_group_name extends Model
{
    protected $fillable = [
        'ID_TG',
        'ID_USER',
        'GROUP_CODE',
        'GROUP_TYPE',
    ];
}
