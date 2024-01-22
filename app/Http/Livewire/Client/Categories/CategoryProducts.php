<?php

namespace App\Http\Livewire\Client\Categories;

use Livewire\Component;

class CategoryProducts extends Component
{
      
    public $category;
    public function mount($category)  {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.client.categories.category-products');
    }
}
