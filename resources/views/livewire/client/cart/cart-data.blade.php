
    <div class="flex flex-wrap justify-center  align-middle items-center gap-8 w-[1/2]">
       
        @if(!empty($CartItem))
        @php
            $errorShow=0;
            $pricing =0;
            $items=0;
            $errorShowMessage=0;
        @endphp
        <div class=" lg:w-[60%] md:w-[60%] w-[100%]">

            <p class="text-lg font-normal text-gray-500 dark:text-gray-400">Shopping cart</p>
             @if ($errorMessage)
              <p class="text-red-600 text-lg">  {{$errorMessage}}</p>
            @endif
          
            <ul class="my-4 space-y-3"> 
                 
                @forelse ($CartItem as $item)
                    @if(!empty($item)) 
                        @if ($item->status !='closed') 
                        @forelse ($item->product as $itemData)
                        
                        @php
                        if ($itemData->discount) {
                          
                            if ($itemData->discount->code) {
                                $percentageDiscount=$itemData->discount->percentage; 
                                $discountPrice=($percentageDiscount*$itemData->price)/100;
                                $itemData->price=$itemData->price-$discountPrice;
                            }  
                            }
                            
                            $pricing+=$itemData->price*$item->quantity;
                            $items=$items+$item->quantity;
                        @endphp
                     
                        <li class="truncate"> 
                            <div  class="flex items-center p-3  text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                <div class="">
                                <div href="{{route('product.view',$itemData->slug)}}" class="group">
                                    <div class="w-28 h-28  overflow-hidden rounded-lg">
                                        <img  src="{{asset('storage/'.$itemData->cover)}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                </div>
                                </div>
                            <div class="flex-1 ml-3 gap-3 whitespace-nowrap ">
                                <div class="flex flex-col gap-1">
                                    <div class="text-xl font-bold"> {{$itemData->name}}</div>
                                    <div class="text-base">{{$item->quantity}} items</div>
                                    <div class="text-base">{{$itemData->currency}} {{$itemData->price*$item->quantity}}</div>                                       
                                </div>
                                @if ($itemData->discount)
                                     @if ($itemData->discount->code)
                                        <span class="text-sm rounded-lg px-3 py-1 bg-myprimary">Discount applied of {{$itemData->discount->percentage}} %</span>
                                    @endif
                                @endif
                                 
                            </div>  
                                <form wire:submit.prevent="removeCart({{$item->id}})" class="text-red-600">
                                    <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg> 
                                    </button> 
                                </form>
                            </div>  
                        </li>
                        @empty
                            No items found 
                            @php
                                $errorShow=1;
                            @endphp
                        @endforelse
                        @else
                        
                        @php
                            $errorShow=1;
                            $errorShowMessage=1;
                        @endphp
                        @endif
                        @else
                        @php
                            $errorShow=1;
                        @endphp
                    @endif
                    
                @empty
                    No items added
                    @php
                        $errorShow=1;
                    @endphp
                @endforelse 

                
            </ul>   

            @if ($errorShowMessage)
                No items added
            @endif
        </div>
        @if (!$errorShow)
            <div class="flex gap-5 lg:w-[30%] md:w-[30%] w-[100%] flex-col p-3  text-gray-900 rounded-lg bg-gray-50  group hover:shadow dark:bg-gray-600 d dark:text-white">
                <h1 class="text-xl font-bold">Cart summary</h1>
                <hr> 
            
                <div class="truncate"> 
                    TOTAL: {{$items}} items
                </div>
                <div class="truncate"> 
                    Amount: {{ $pricing}}
                </div>
                <form class="truncate" wire:submit.prevent="Checkout"> 
                    <button  wire:click.prevent="Checkout" wire:target="Checkout" wire:loading='disabled' class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 flex gap-1">
                        <div class="" wire:loading wire:target="Checkout"> <x-loading/></div>
                        <div class="" wire:loading.remove wire:target="Checkout"> <i class="fa-solid fa-cart-money"></i> Place order</div> 
                    </button>
                </form> 
            </div> 
        @endif
       
        @else
        <div class="text-lg flex flex-col gap-3 mt-10">
           <div class="">No items added to cart </div> 
            <div><a href="{{route('product.all')}}" class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 flex gap-1">Continue Shopping</a></div>
        </div>
       
        @endif      
    </div>