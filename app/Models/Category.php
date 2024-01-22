<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
       protected $fillable = [
        'slug',
        'name', 
        'description',
    ];

  public  function products() {
        return $this->hasMany(Products::class);
        
    }
    
}
