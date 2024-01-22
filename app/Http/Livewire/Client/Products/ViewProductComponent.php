<?php

namespace App\Http\Livewire\Client\Products;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewProductComponent extends Component
{
    public $item_number;
    public $product;
    public $errorMessage;
    public $successMessage;
    public $CartItem;
    
    protected $rules = [
        'item_number' => 'required|min:1', 
    ];
    public function mount($products)  {
        $this->product = $products; 
    }    
    public function addItemNumber()  {
        $this->item_number;   
    }

    public function addToCart()  {
          $this->validate();

          if (auth()->user()) {
      
          if ($this->product->quantity_available >  $this->item_number) { 

            $findCartItem = DB::table('carts')
                                ->join('carts_products','carts.id','=','carts_products.carts_id')
                                ->where('carts.user_id',auth()->user()->id)
                                ->where('carts_products.products_id', $this->product->id)->first(); 
                 
                                
           if($findCartItem ){
            $this->item_number = $this->item_number+$findCartItem->quantity;

            DB::table('carts')
                    ->join('carts_products','carts.id','=','carts_products.carts_id')
                    ->where('carts.user_id',auth()->user()->id)
                    ->where('carts_products.products_id', $this->product->id)
                    ->update(['quantity'=>$this->item_number]);
           }else{
               $cart= Carts::create([
                    'user_id'=>auth()->user()->id,
                    'quantity'=>$this->item_number,
                    'product_id'=>$this->product->id
                ]); 

                
                $cart->product()->attach($this->product->id, ['products_id' => $this->product->id, 'carts_id' => $cart->id]);

           }
            $this->successMessage='added to cart';
             return redirect()->away(url()->previous());


          }else{
            $this->errorMessage='stock outage';
          } 
          }else{
            $this->errorMessage='<span class="m-0 p-0 text-lg">Unauthorized user please login</span>';
          }
              
    }

    public function render()
    {
        return view('livewire.client.products.view-product-component',[
            'product'=>$this->product
        ]);
    }
}
