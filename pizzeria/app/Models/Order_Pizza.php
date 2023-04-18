<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'pizza_id',
        'count',
    ];

    protected $table = 'order_pizza';
    

    public function pizzas(){
        return $this->belongsTo('App\Model\Pizza','pizza_id');
    }
    public function orders(){
        return $this->belongsTo('App\Model\Order','order_id');
    }


}
