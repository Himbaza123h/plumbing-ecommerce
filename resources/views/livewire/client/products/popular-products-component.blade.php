<div class="w-[100%] py-24 px-12  flex-col justify-start items-center gap-24 inline-flex dark:bg-[#20232C]">
  <div class="justify-start items-start inline-flex">
    <div class=" text-2xl lg:text-4xl md:text-4xl font-bold   dark:text-gray-300 text-mytext" >Explore popular products</div>
  </div>
 
<div class=">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    
 @if ($products)
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      
           @forelse ($products as $item)
                @include('client.includes.productCard') 
           @empty 
           @endforelse
       
    </div>
    @if (count($products) >= 8)
        <div class="flex justify-center mt-5">
            <a href="{{route('product.all')}}" class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 ">Explore more products</a>
        </div>
    @endif
   
    @endif
  </div>
</div> 