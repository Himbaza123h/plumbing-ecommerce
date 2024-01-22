<?php

namespace App\Models;

use App\Models\Carts;
use App\Models\Reviews;
use App\Models\Category;
use App\Models\Discounts;
use App\Models\Shippings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
        
    protected $fillable = ['name',
                            'slug',
                            'description',
                            'price',
                            'quantity_available',
                            'images',
                            'cover',
                            'details',
                            'currency',
                            'category_id'
                            ];
    protected $casts = [
            'images' => 'array', 
            'details' => 'array',
        ];
 

      public function category(){
        return $this->belongsTo(Category::class);
        
    }
    

    public function carts() { 
         return $this->belongsToMany(Carts::class, 'cart_products')
            ->withPivot('products_id', 'carts_id')
            ->withTimestamps();
    }

   
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
    public function discount(){
        return $this->hasOne(Discounts::class,'product_id');
        
    }

    public function shipping()
    {
        return $this->hasOne(Shippings::class,'product_id');
    }

    
}
