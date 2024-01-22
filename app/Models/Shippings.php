<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shippings extends Model
{
    use HasFactory;
 
    protected $fillable = [ 
        'product_id','shipping','city'  
    ];
 
     protected $casts = [
        'city' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

      public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
