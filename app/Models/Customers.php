<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;
        protected $fillable = [ 
        'user_id',  
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_country',
        'shipping_method',
        'tracking_number',
        'shipping_cost',
        'shipping_status',
        'estimated_delivery_date'
    ];
 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
