<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    // public function getUserId(){
    //     return Auth::id();
    // }


    public function index()
    {
          $pizzas = Cart::all()->where('user_id','=',Auth::id());

         return $pizzas;

        
    }




    public function store(Request $request)
    {
        foreach($request->all() as $key => $value) { 
            $pizza_cart = Cart::where('pizza_id','=',(int)$key)->where('user_id','=',Auth::id())->exists();
            if($pizza_cart ){
                
            }
            else{
                Cart::create([
                    'user_id'=>Auth::id(),
                    'pizza_id'=>(int)$key,
                    'count'=>(int)$value,
                ]);
            }
        }
    }

   
    public function destroy(string $id)
    {
        Cart::query()->where('pizza_id','=',$id)->where('user_id','=',Auth::id())->delete();
    }
    
   
   public function update(Request $request)
    {
        
        
        
       
    }

    public function cartupdate(Request $request)
    {
       
        foreach($request->all() as $key => $value) { 
           
            DB::table('user_pizza')->where('pizza_id',(int)$key)->where('user_id',Auth::id())->update(['count'=>(int)$value]);
        }
       
    }

    


  


}
