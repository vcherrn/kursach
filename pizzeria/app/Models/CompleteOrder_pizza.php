<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteOrder_pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'completeorder_id',
        'pizza_id',
        'count',
    ];

    protected $table = 'completeorder_pizza';
    

    public function pizzas(){
        return $this->belongsTo('App\Model\Pizza','pizza_id');
    }
    public function completeorders(){
        return $this->belongsTo('App\Model\CompleteOrder','completeorder_id');
    }


}
