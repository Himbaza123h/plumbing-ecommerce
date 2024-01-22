<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Carts;
use Livewire\Component;

class Counting extends Component
{
    public $CartItem;
    public $CartItemCount;
    public function mount()  {
        if (auth()->user()) { 
            $this->CartItemCount = Carts::where('user_id',auth()->user()->id)->where('status','!=','closed')->count(); 
            $this->CartItem =auth()->user()->cart;  
            
        }     
    }

    public function removeCart($id){
    
        $CartItem = Carts::where('user_id',auth()->user()->id)->first(); 
        if ($CartItem) {
            $CartItem->delete();
            $CartItem->product()->detach($CartItem->id, ['products_id' => $CartItem->id]);
            return redirect()->away(url()->previous());

        } else{
            dd("no data found");
        }

                

    }
    public function render()
    {
        return view('livewire.client.cart.counting');
    }
}
