<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Carts;
use Livewire\Component;

class OrderViewing extends Component
{
    
    public  $order;
    public $order_id;
    public $order_status;
    public $order_date;
    public $orderItems;
    public $errorMessage;
    public function mount($order)  {
 
        try { 
            $this->order=$order; 
            $this->order_id=$order->id; 
            $this->order_date=$order->created_at;
            $this->order_status=$order->status; 

            $cart_ids=explode(',',$this->order->cart_id);
            $this->orderItems = Carts::whereIn('id',$cart_ids)->get(); 
                    
        

        } catch (\Throwable $th) {
            $this->errorMessage=$th->getMessage();
        }
            
        
        
    }
    public function render()
    {
        return view('livewire.client.orders.order-viewing');
    }
}
