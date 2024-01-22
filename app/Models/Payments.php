<?php

namespace App\Models;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;
 

    protected $fillable = [
        'order_id','payment_date',
        'amount','payment_method',
        'payed','currency','reference','street_address','house_address','state','city','phone','tx_ref'
    ];

    public function order() {
         return $this->belongsTo(Orders::class,'order_id');
    }
}
