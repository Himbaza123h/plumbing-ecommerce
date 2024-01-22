@extends('layouts.web.website')
@section('content')   
    <section class="dark:bg-gray-900 "> 
        @if (!empty($category)) 
            @livewire('client.categories.category-products', ['category' => $category], key($category->id))
    
        @endif
    </section> 
    @include('layouts.web.footer')
    @endsection
