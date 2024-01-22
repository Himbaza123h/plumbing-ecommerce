<div class="w-[100%] py-24 px-12  flex-col justify-start items-center gap-24 inline-flex dark:bg-[#20232C]">
  <div class="flex flex-col justify-center items-center w-[100%] gap-9">
    <div class=" text-2xl lg:text-4xl md:text-4xl font-bold   dark:text-gray-300 text-mytext" >
        Explore more products
    </div>
 
    <form  class="flex-grow  w-full lg:w-1/2 md:w-1/2 relative" > 
        <div class="absolute top-2 left-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
        </div>
         <input type="product" id="product"  wire:model="product" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600 focus:border-green-700 focus:ring-green-700" placeholder="search product" required>
    </form>
</div> 
    <div class=">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        
        @if ($products)
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @forelse ($products as $item)
                    @include('client.includes.productCard') 
                @empty 
                    <x-NoResults/>
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