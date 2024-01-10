<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enteringblockhistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ebh ',
        'requester', 
        'reason', 
        'date_shamsi', 
        'time',
    ];
    protected $table='enteringblockhistories';
}
