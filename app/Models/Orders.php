<?php

namespace App\Models;

use App\Models\User;
use App\Models\Carts;
use App\Models\Payments;
use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','order_date','total_amount'];

    public function items()  {
        return $this->hasMany(OrderItems::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
