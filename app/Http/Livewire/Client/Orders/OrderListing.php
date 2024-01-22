<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Carts;
use App\Models\Orders;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class OrderListing extends Component
{
    public  $ordersListing;
    public function mount()  {
        $this->ordersListing=Orders::where('user_id',auth()->user()->id)->get();
    }

    public function CancelOrder($id){
        try {
            $orderData=Orders::find($id); 
                
            $cart_ids=explode(',',$orderData->cart_id);
            $cartItems = Carts::whereIn('id',$cart_ids)->get();  
            $orderData->update(['status'=>'failed']);
            foreach ($cartItems as $item) {
                $item->update(['status'=>'closed']);
                
            }
        return redirect()->route('order.client');
        } catch (\Throwable $th) {
           dd($th->getMessage());
        }

    }

    public function CheckOutOrder($id){
   
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        $currency='';
        $orderData=Orders::where('id',$id)->first();

            $cart_ids=explode(',',$orderData->cart_id);
            $cartItems = Carts::whereIn('id',$cart_ids)->get();  
          
            foreach ($cartItems as $item) {
              foreach ($item->product as $itemData) {
                $currency=$itemData->currency;
              }
                
            } 
        Session::put('order', $this->ordersListing);
        Session::put('currency', $currency);
      
        return redirect()->to('/payment/info');

    }
    public function render()
    {
        return view('livewire.client.orders.order-listing');
    }
}
