<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'photo_path',
    ];

    public function carts(){
        return $this->hasMany(Cart::class, 'pizza_id');
    }
    // protected $hidden = [

    // ];

    
    //аксессор и мутатор
}
