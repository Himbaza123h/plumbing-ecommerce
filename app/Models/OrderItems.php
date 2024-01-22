<?php

namespace App\Models;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable=  ['order_id','product_id','quantity'];

    public function order() {
        return $this->belongsTo(Orders::class,'order_id');
    }
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
