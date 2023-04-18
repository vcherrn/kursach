<?php

use App\Http\Controllers\adminMailController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\OrderController;
use App\Mail\AdminMail;
use App\Mail\OrderEmail;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('isuserauth');



Route::get('/homepage', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('users', function(){
    return DB::table('users')
   ->get();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('pizzas',[PizzaController::class,'index'])->name('pizzas');
Route::get('pizzas/create',[PizzaController::class,'create'])->name('pizzas.create');
Route::post('pizzas',[PizzaController::class,'store'])->name('pizzas.store');
Route::get('pizzas/{pizzas}',[PizzaController::class,'show'])->name('pizzas.show');
Route::get('pizzas/{pizzas}/edit',[PizzaController::class,'edit'])->name('pizzas.edit');
Route::put('pizzas/{pizzas}',[PizzaController::class,'update'])->name('pizzas.update');
Route::delete('pizzas/{pizzas}',[PizzaController::class,'destroy'])->name('pizzas.destroy');


Route::post('carts',[CartController::class,'store'])->name('carts.store');
Route::get('carts', function(){

    return DB::table('pizzas')
     ->join('user_pizza', 'pizzas.id', '=', 'user_pizza.pizza_id')
     ->where('user_pizza.user_id', '=', Auth::id())
    ->get();

});
Route::get('carts/count', function(){
    return DB::table('user_pizza')
    ->join('pizzas', 'user_pizza.pizza_id', '=', 'pizzas.id')
    ->where('user_pizza.user_id', '=', Auth::id())
     ->select('user_pizza.count')
   ->get();
});
Route::put('carts/count', [CartController::class,'update']);
Route::delete('carts/{carts}',[CartController::class,'destroy'])->name('carts.destroy');
Route::put('carts/{carts}',[CartController::class,'update'])->name('carts.update');
Route::put('carts/count/update',[CartController::class,'cartupdate']);

Route::get('/cart', function(){
    return Inertia::render('Cart');
})->middleware(['auth','verified'])->name('cart');


Route::get('/order', function(){
    return Inertia::render('Order');
})->middleware(['auth','verified'])->name('order');

Route::get('orderform', function(){
    return Inertia::render('OrderForm');
})->middleware(['auth','verified'])->name('orderform');

Route::get('/completeorder', function(){
    return Inertia::render('CompleteOrder');
})->middleware(['auth','verified'])->name('completeorder');

Route::get('completeorders', function(){
   return DB::table('pizzas')
    ->join('completeorder_pizza', 'pizzas.id' , '=', 'completeorder_pizza.pizza_id')
    ->join('completeorders', 'completeorders.id', '=', 'completeorder_pizza.completeorder_id')->orderBy('completeorders.id','desc')
    ->where('completeorders.user_id', '=', Auth::id())
   ->get();
});
Route::get('orders', function(){
    return DB::table('pizzas')
     ->join('order_pizza', 'pizzas.id' , '=', 'order_pizza.pizza_id')
     ->join('orders', 'orders.id', '=', 'order_pizza.order_id')->orderBy('orders.id','desc')
    ->get();
 });
Route::get('sellpizzas/count', function(){
    return DB::table('pizzas')
    ->join('completeorder_pizza', 'pizzas.id' , '=', 'completeorder_pizza.pizza_id')
    ->join('completeorders', 'completeorders.id', '=', 'completeorder_pizza.completeorder_id')
    ->where('completeorders.user_id', '=', Auth::id())
   ->get();
});

Route::post('orderform',[OrderController::class,'store'])->name('orderform.store');

Route::delete('delete-order/{order}', [OrderController::class,'deldata']);


Route::get('/admin-place', function(){
    return Inertia::render('AllOrders');
})->middleware('isuseradmin');

 Route::post('send-email-to-client', [mailController::class,'send']);
 Route::post('send-email-to-admin', [adminMailController::class,'send']);



// Route::get('/users', [Auth\LoginController::class,'postLogin']);