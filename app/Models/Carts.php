<?php

namespace App\Models;

use App\Models\User; 
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','quantity','status'];
     
    public function product(){
        return $this->belongsToMany(Products::class);
        return $this->belongsToMany(Product::class, 'cart_products')
            ->withPivot('products_id', 'carts_id')
            ->withTimestamps();
        
    }
    public function cart(){
        return $this->hasOne(Orders::class);
        
    }
      public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
    // public function orders()
    // {
    //     return $this->belongsToMany(Orders::class, 'cart_order', 'carts_id', 'order_id');
    // }

    public function user(){
        return $this->belongsTo(User::class);
        
    }
}