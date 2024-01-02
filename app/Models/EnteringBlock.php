<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnteringBlock extends Model
{
    use HasFactory;
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
