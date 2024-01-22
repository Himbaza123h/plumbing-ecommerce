<?php

namespace App\Http\Livewire\Client\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{ 
    public $category;
    
    protected $queryString = [
        'category' => ['except' => '', 'as' => 'source'], 
    ];

 
    public function mount(){ 
    }
    public function render()
    {
        return view('livewire.client.categories.category-component',[
           'categories'=> Category::where('name', 'like', '%'.$this->category.'%')->get(),
        ]);
    }
}
