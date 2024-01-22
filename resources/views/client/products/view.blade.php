@extends('layouts.web.website')
@section('content')   
    <section class="dark:bg-gray-900 "> 
     @if (!empty($products)) 
           @livewire('client.products.view-product-component', ['products' => $products], key($products->id))
          
           @if (count($otherProducts)>0)
                <div class="w-[100%] py-24 px-12 flex-col justify-start items-left gap-24 inline-flex dark:bg-[#20232C]">
               <div class="justify-start items-start inline-flex">
                    <div class=" text-2xl lg:text-4xl md:text-4xl font-bold   dark:text-gray-300 text-mytext" >Related Products</div>
               </div> 
               <div class=">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
                    @if ($otherProducts)
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                         
                              @forelse ($otherProducts as $item)
                                   @include('client.includes.productCard') 
                              @empty 
                              @endforelse
                         
                    </div> 
                    @endif
               </div>
           @endif
          </div>
 
     @endif
     </section> 
    @include('layouts.web.footer')
    @endsection
