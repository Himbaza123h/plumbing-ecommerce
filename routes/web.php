<?php

use App\Models\Orders;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $newProduct= DB::table('products')->orderBy('created_at', 'desc')->limit(1)->first();
    return view('welcome',compact('newProduct'));
})->name('home');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/view/category/{slug}', function ($slug) {
    $category=Category::where('slug',$slug)->first(); 
    return view('client.category.products',compact('category'));
})->name('category.view');

Route::get('/products/all',function (){
    return view('client.products.app');
})->name('product.all');

Route::get('/view/product/{slug}', function ($slug) {
    $products=Products::where('slug',$slug)->first(); 
    if (!empty($products)) { 
        $otherProducts=Products::where('slug',$slug)->where('category_id',$products->category->id)->where('id','!=',$products->id)->orderby('id', 'asc')->limit(8)->get();
    }else{
         $otherProducts = ''   ;
    }
 
    return view('client.products.view',compact(['products','otherProducts']));
})->name('product.view');

Route::middleware(['auth', 'verified'])->group(function () {

    
    route::get('/cart',function (){
        return view('client.cart.app');
    })->name('cart.view');

    Route::get('/dashboard', function () {
        return redirect()->route('order.client');
    })->name('dashboard');
        
    Route::get('my/orders',function (){
        return view('client.orders.app');
    })->name('order.client');

    Route::get('my/order/{id}',function ($order){
            $order=Orders::where('id',$order)->where('user_id',auth()->user()->id)->first();
            return view('client.orders.view',compact('order'));
        })->name('view.order.client');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 

    Route::get('/payment/info', [PaymentController::class, 'index'])->name('payment');
    // Route::post('/payment/create',[PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/redirect',[PaymentController::class, 'redirectToPayLink'])->name('payment.redirect');
    Route::get('/payment/confirm',[PaymentController::class, 'handleCallback'])->name('payment.confirm');
});


Route::middleware(['admin','auth'])->group(function (){
    // admin routes  
    Route::get('admin/orders/lst',function (){
        return view('dashboard.orders.app');
    })->name('orders.admin');
    Route::get('admin/order/{id}',function ($order){
        $order=Orders::find($order);
        return view('dashboard.orders.view',compact('order'));
    })->name('view.order.admin');
});

require __DIR__.'/auth.php';
