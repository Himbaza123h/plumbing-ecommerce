<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;
use App\Models\Products;

class PopularProductsComponent extends Component
{
    public $products ;
    public function mount() {
        $this->products=Products::all();
    }
    public function render()
    {
        return view('livewire.client.products.popular-products-component');
    }
}
