<section class="text-gray-700 body-font overflow-hidden bg-white dark:bg-gray-900 " >
  <div class="lg:w-4/5  mx-auto">
  @if (!empty($product))  
  <div class="container px-5 py-24 mx-auto">
    <div class=" flex flex-wrap">
  
      <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center block h-full rounded-lg  object-centerrounded  dark:text-gray-800" src="{{asset('storage/'.$product->cover)}}"> 

      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h2 class="text-sm title-font text-gray-500  dark:text-gray-300 tracking-widest"><a href="{{route('category.view',$product->category->slug)}}">{{$product->category->name}}</a></h2>
        <h1 class="text-gray-900 dark:text-gray-200 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
        <div class="flex mb-4"> 
          <span class="flex gap-3">
            @if (!empty($product->shipping->shipping))  
            <p class="text-gray-500 dark:text-gray-200 pt-3 text-sm">
                 Delivery available:
                 <div class="flex flex-wrap gap-3"> 
                   @foreach ($product->shipping->city as $item)
                       <span class="dark:text-gray-300 px-1 mt-2">{{$item}}</span>
                   @endforeach </div>
            </p>
            @else
            {{-- <span class="bg-red-400 px-2 text-sm">No delivery available</span> --}}
            @endif 
          </span>
        </div>
        <div class="flex flex-col gap-1 text-gray-600 dark:text-gray-200">
           <p class="leading-relaxed dark:text-gray-200">{!! $product->description !!}</p>
        <p> 
          <span class="title-font font-medium text-2xl dark:text-gray-200  text-gray-900"> {{$product->currency}} {{$product->price}}</span>
        </p>
        </div> 
        @if ($product->quantity_available > 0) 
        @error('item_number') <span class="text-red-400 px-2 text-sm font-bold">{{ $message }}</span> @enderror
        @if ($errorMessage)
          <span class="text-red-400 px-2 text-sm font-bold">  {!! $errorMessage!!}</span>
        @endif
        @if ($successMessage)
            <span class="text-green-400 px-2 text-sm font-bold"> {!! $successMessage!!}</span>
        @endif
              <div class="flex flex-col md:flex-row lg:flex-row mt-3 flex-wrap gap-3 "> 
                <button id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" class="flex gap-3 text-gray-600 dark:text-gray-200 border border-gray-400 px-4 py-1 rounded-lg" type="button">
                  @if ($item_number)
                      {{$item_number}} items
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>

                      @else
                      Add number of item
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg> 
                  @endif 
                </button> 
            <!-- Dropdown menu -->
            <div id="dropdownToggle" wire:ignore class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-72 dark:bg-gray-700 dark:divide-gray-600" >
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
                  <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input type="number" wire:keyup="addItemNumber" min="1" wire:model.defer="item_number" id="item_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-myprimary focus:border-myprimary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-myprimary dark:focus:border-myprimary" placeholder="item number" required autofocus>
                    </div>
                  </li>  
                </ul>
            </div> 
            <div class=""> 
              <button wire:click.prevent="addToCart" wire:target="addToCart" wire:loading='disabled' class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 flex gap-1">
                <div class="" wire:loading wire:target="addToCart"> <x-loading/></div>
                <div class="" wire:loading.remove wire:target="addToCart"> <i class="fa-solid fa-cart-shopping"></i> add to cart</div> 
              </button>
            </div> 
          </div>
          @else
            
            <span class="bg-red-400 px-2 text-sm">stock is empty</span>
        @endif
        
      </div>
    </div>

    
    @if(!empty($product->details))
      <div class="flex flex-col mt-10 mb-10">  
        <div class="mb-3">
          <h1 class="text-gray-900 dark:text-gray-200 text-3xl title-font font-medium mb-1">Additional information</h1> 
        </div>
        <div class=""> 
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 border border-gray-600 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
                    <tr class="border border-gray-600">
                        <th scope="col" class="px-6 py-3">
                            Property
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th> 
                    </tr>
                </thead>
                <tbody>
                    
                      @foreach ($product->details as $key=>$value)
                        <tr class="">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$key}} 
                            </th>
                            <td class="px-6 py-4">
                                {{$value}}
                            </td> 
                        </tr> 
                      @endforeach
                       
                </tbody>
            </table>
        </div>

        </div>
      </div>
    @endif


     @if(!empty($product->images)) 
      <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
        <div class="-m-1 flex flex-wrap md:-m-2">
          @foreach ($product->images as $index => $item)
                <div class="flex w-1/3 flex-wrap">
                <div class="w-full p-1 md:p-2">
                  <img
                    alt="gallery"
                    class="block h-full w-full rounded-lg object-cover object-center"
                    src="{{asset('storage/'.$item)}}" />
                </div>
              </div> 
          @endforeach  
        </div>
      </div> 
          
    @endif 

  </div>
@endif
</div>
</section> 