<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CompleteOrder;
use App\Models\Log;
use App\Models\Order;
use App\Models\Order_Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
              $order = $request->all();

                $active_order = new Order([
                    'user_id'=>Auth::id(),
                    'town'=>$order['town'],
                    'street'=>$order['street'],
                    'house'=>$order['house'],
                    'apartment'=>$order['apartment'],
                    'phone_number'=>$order['phone'],
                    'special_requests'=>$order['queries'],
                ]);
                $active_order->save();

                $complete_order = new CompleteOrder([
                    'user_id'=>Auth::id(),
                    'town'=>$order['town'],
                    'street'=>$order['street'],
                    'house'=>$order['house'],
                    'apartment'=>$order['apartment'],
                    'phone_number'=>$order['phone'],
                    'special_requests'=>$order['queries'],
                ]);
                $complete_order->save();

                  $isUser =  Cart::where('user_id','=',Auth::id())->get();
                  $orderNumber =  DB::table('orders')->latest('id')->where('user_id','=',Auth::id())->get()->first();
               
                  
                 foreach($isUser as $key => $value) { 
                  
                    DB::table('order_pizza')->insert([
                        'order_id'=>$orderNumber->id,
                        'pizza_id' => $value->pizza_id,
                        'count'=> $value->count
                    ]);
                 }

                 $completeorderNumber =  DB::table('completeorders')->latest('id')->where('user_id','=',Auth::id())->get()->first();
                 foreach($isUser as $key => $value) { 
                  
                    DB::table('completeorder_pizza')->insert([
                        'completeorder_id'=>$completeorderNumber->id,
                        'pizza_id' => $value->pizza_id,
                        'count'=> $value->count
                    ]);
                 }

                 DB::table('user_pizza')->where('user_id', '=', Auth::id())->delete();

                 $log = new Log([
                    'user_id'=>Auth::id(),
                    'record'=>'был сделан заказ'
                 ]);
                 $log->save();
               

        }

        public function deldata(string $id)
        {   
             DB::table('order_pizza')->where('order_id', '=', $id)->delete();
             DB::table('orders')->where('id', '=', $id)->delete();
             $log = new Log([
                'user_id'=>Auth::id(),
                'record'=>'Заказ был выполнен'
             ]);
             $log->save();
        }
      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
