<?php

namespace App\Http\Livewire\Dashboard\Orders;

use App\Models\Orders;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderListing extends Component
{

    public $order;
        protected $queryString = [
            'order' => ['except' => '', 'as' => 'order'], 
        ];
 

    public function render()
    {
        return view('livewire.dashboard.orders.order-listing',[
            'ordersListing'=>
            DB::table('users')
            ->join('orders','orders.user_id','=','users.id')
            ->where('users.name', 'like', '%'.$this->order.'%')
            ->orWhere('orders.id', 'like', '%'.$this->order.'%')     
            //  ->groupBy('orders.id','users.id')       
            ->get()
        ]);
    }
}
