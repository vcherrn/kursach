<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'town',
        'street',
        'house',
        'apartment',
        'phone_number',
        'special_requests',
    ];
    

      protected $table = 'completeorders';

}
