<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Carts;
use App\Models\Orders;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;

class CartData extends Component
{
    public $CartItem;
    public $pricing;
    public $errorMessage;
    public $successMessage;
    public $ordercreation;

    public function mount()  {
         if (auth()->user()) { 
            $this->CartItem= auth()->user()->cart;
         }else{
            return redirect()->away(url()->previous());
         }
      
    }
    
    public function removeCart($id){
    
        try {
            $CartItem = Carts::where('user_id',auth()->user()->id)->first(); 
            if ($CartItem) {
                $CartItem->delete();
                $CartItem->product()->detach($CartItem->id, ['products_id' => $CartItem->id]);
                    return redirect()->away(url()->previous());

            } else{
                
            }  
            
        } catch (\Throwable $th) {
            $this->errorMessage= 'no data found';
        }
     

    }

    public function Checkout(){

        try { 
            $pricing=0;
            $carts='';
            $currency='';
            foreach ($this->CartItem as $item) {
                if(!empty($item)) {
                    foreach ($item->product as $itemData) {
                        $currency=$itemData->currency;
                      if ($itemData->discount) {
                        $percentageDiscount=$itemData->discount->percentage; 
                        $discountPrice=($percentageDiscount*$itemData->price)/100;
                        $itemData->price=$itemData->price-$discountPrice;
                      }
                       
                        $carts.=",".$item->id; 
                        $pricing+=$itemData->price*$item->quantity;
                    }

                }
            }
            
            $cart_ids=explode(',',$carts);
            $orderCartItems = Orders::whereIn('cart_id',$cart_ids)->get();  
            if (count($orderCartItems)> 0) {
                return redirect()->route('order.client');
            }else{
                 $this->ordercreation= Orders::create([
                    'user_id'=>auth()->user()->id, 
                    'cart_id'=>$carts,
                    'order_date'=>now(),
                    'total_amount'=>$pricing,
                    'status'=>'pending',
                    ]); 
            } 
            if ($this->ordercreation) {
                
                $order = Session::get('order', []);

                if ($order != null and $order != []) {
                    $request->session()->forget(['order', 'currency']);
                }
                
                Session::put('order', $this->ordercreation);
                Session::put('currency', $currency);
                    
            }   
            return redirect()->route('payment');
                        
        } catch (\Throwable $th) { 
              $this->errorMessage=$th->getMessage();
        }
  
    }

    public function render()
    {
        return view('livewire.client.cart.cart-data');
    }
}
