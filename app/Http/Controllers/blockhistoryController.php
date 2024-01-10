<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blockhistoryController extends Controller
{
    protected $fillable = [
        'id_b',
        'f_name', 
        'l_name', 
        'national_code', 
        'company_name',
        'reason', 
        'isBlocked',
    ];
    protected $table='enteringblocks';
}
