<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;
use App\Models\Products;

class ProductList extends Component
{ 
    public $product;
    protected $queryString = [
            'product' => ['except' => '', 'as' => 'source'], 
        ];

  
    public function render()
    {
        return view('livewire.client.products.product-list',[
            'products'=>Products::where('name', 'like', '%'.$this->product.'%')->get()
        ]);
    }
}
