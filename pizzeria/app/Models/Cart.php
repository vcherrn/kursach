<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'user_pizza';

    protected $fillable = [
        'user_id',
        'pizza_id',
        'count',
    ];

    public function pizzas(){
        return $this->belongsTo('App\Model\Pizza','pizza_id');
    }
    public function users(){
        return $this->belongsTo('App\Model\User','user_id');
    }

}
