<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discounts extends Model
{
    use HasFactory; 
     protected $fillable = [
        'code',
        'product_id',
        'name',
        'description',
        'percentage',
        'start_date',
        'end_date',
        'active',
    ];

    public function product(){
        return $this->belongsTo(Products::class,'product_id');   
    }

}
