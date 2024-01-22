<div class="">
    <a href="#cart"  wire:poll data-modal-target="cart-modal" data-modal-toggle="cart-modal" class="border-0 relative border-gray-200 focus:outline-nonetext-center inline-flex items-center ">
        <span  class="absolute bg-myprimary text-white dark:bg-white dark:text-gray-800 px-2 rounded-full -right-3 -top-3">{{($CartItemCount != 0)? $CartItemCount:''}} </span><i class="fa-solid fa-cart-shopping"></i>
    </a>

    <!-- Main modal -->
    <div id="cart-modal" wire:ignore tabindex="-1" aria-hidden="true" class="fixed w-[400px] top-0 right-0 z-50 hidden  p-4 overflow-x-hidden overflow-y-auto h-full  bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="relative  h-full w-full">
            <!-- Modal content -->
            <div class="relative ">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="cart-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        Cart
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="justify-center align-middle items-center">
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Shopping cart</p>
                    <ul class="my-4 space-y-3"> 
                    @if(!empty($CartItem))
                        @forelse ($CartItem as $item)
                         @if ($item->status !='closed') 
                         @if(!empty($item))
                           @forelse ($item->product as $itemData)
                              
                            <li class="truncate"> 
                                <div  class="flex items-center p-3  text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                 <div class="">
                                    <div href="{{route('product.view',$itemData->slug)}}" class="group">
                                        <div class="w-14 h-14  overflow-hidden rounded-lg">
                                            <img  src="{{asset('storage/'.$itemData->cover)}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                    </div>
                                 </div>
                                <div class="flex-1 ml-3 whitespace-nowrap ">
                                    <div class="flex flex-col gap-1">
                                           <div class="text-base font-bold"> {{$itemData->name}}</div>
                                           <div class="text-sm">{{$item->quantity}} items</div>
                                           <div class="text-sm">{{$itemData->currency}} {{$itemData->price*$item->quantity}}</div>
                                    </div>
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
                           @endforelse
                           @endif
                          
                        @else
                            No items added
                        @endif
                        @empty
                            No items added
                        @endforelse 

                        @else
                        No items added
                        @endif
                      
                    </ul>  
                    <a href="{{route('cart.view')}}" class="block text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 ">Go to cart </a>

                </div>
            </div>
        </div>
    </div> 

</div>

