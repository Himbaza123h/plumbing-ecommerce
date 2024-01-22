<?php

namespace App\Models;

use App\Models\User; 
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','rate','comment'];

     public function user(){
        return $this->belongsTo(User::class);
        
    }

     public function product(){
        return $this->belongsTo(Products::class);
        
    }


}
