<div class="flex flex-wrap w-[100%] gap-4">
    {{$errorMessage}}
    @if (auth()->user()->role_id ==1)
        
   
    <div  class="flex-1 md:block lg:block   p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 " wire:submit.prevent="updateOrder"> 
        <form class="flex flex-col gap-4" wire:submit.prevent="updateOrder"> 
             <div class="w-[100%]">
                 <label class="text-gray-600">Order date</label>
                 {{$order_date}}
                <input disabled type="datetime-local" value="{{$order_date}}" id="order_date"  wire:model.defer="order_date"  class=" border-2 shadow-sm outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5  dark:placeholder-gray-400 dark:text-white  border-gray-300 focus:border-primary-500 " placeholder="search product" required>
            </div> 
            <div class="w-[100%]">  
                <select wire:model="order_status"  class=" border-2 shadow-sm outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5  dark:placeholder-gray-400 dark:text-white  border-gray-300 focus:border-primary-500">
                    <option>Select option</option>
                    <option {{($order_status=='pending')? 'selected':''}}>pending</option>  
                    <option {{($order_status=='paid')? 'selected':''}}>paid</option>
                    <option {{($order_status=='delivered')? 'selected':''}}>delivered</option>
                   
                </select>
                <p class="font-normal text-gray-700 dark:text-gray-400">Update order when the product was delivered.</p>
                    
            </div> 
            <div class=""> 
              <button wire:click.prevent="updateOrder" class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 flex gap-1">
                <div class="mt-1" wire:loading wire:target="updateOrder"> <x-loading/></div>
                Update</button> 
            </div>
        </form> 
    </div>
 @endif
    <div class="flex-1 md:block lg:block text-sm text-left text-gray-500 dark:text-gray-400 p-3 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Order items</h5>  
        <div class="flex flex-col gap-3">
               @if(!empty($orderItems))
                @php
                    $errorShow=0;
                    $pricing =0;
                    $items=0;
                    $currency='';
                @endphp
                    @forelse ($orderItems as $item) 
                        @if(!empty($item))  
                            @forelse ($item->product as $itemData)

                            @php
                                if (!empty($itemData->discount)) {
                                    if ($itemData->discount->code) {
                                        $percentageDiscount=$itemData->discount->percentage; 
                                        $discountPrice=($percentageDiscount*$itemData->price)/100;
                                        $itemData->price=$itemData->price-$discountPrice;
                                    }
                                }
                                
                                    
                                    $pricing+=$itemData->price*$item->quantity;
                                    $items=$items+$item->quantity;
                                    $currency=$itemData->currency;
                                @endphp

                                <div class="flex flex-col gap-1 bg-gray-100 w-[100%] p-2">
                                    <div class="font-semibold"> {{$itemData->name}}</div>
                                    <div class="">{{$item->quantity}} items</div>
                                    <div class="">{{$itemData->currency}} {{$itemData->price*$item->quantity}}</div>                                       
                                </div>
                            @empty
                            @endforelse
                            @endif
                     
                        @empty
                    @endforelse
                @endif

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Amount: {{$pricing}} {{$currency}}</h5>  

        </div>  
    </div>

    <div  class=" flex-1 lg:block md:block p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 "> 
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Customer</h5>  
        
        <div class="flex flex-col gap-4">
            <div class="w-[100%]">
                <p class="text-gray-600">{{$order->user->name}}</p>
            </div>
             <div class="w-[100%]">
                {{{$order->user->email}}}
            </div>  
        </div> 
    </div>
 @if ($order->payment)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">  
        
           <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Payment</h5> 
             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        OrderID
                    </th> 
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Payment date 
                        </div>
                    </th>
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Payment Method 
                        </div>
                    </th>
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Amount 
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                           Ccurrency
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Status 
                        </div>
                    </th>  
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             Reference
                        </div>
                    </th> 
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             Street address
                        </div>
                    </th> 
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             State
                        </div>
                    </th> 
                     <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             City
                        </div>
                    </th>  
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             Phone
                        </div>
                    </th> 
                </tr>
            </thead>
            <tbody>    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        #order-{{$order->payment->order_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$order->payment->amount}}
                    </td>
                     <td class="px-6 py-4">
                        {{$order->payment->currency}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->payment->payment_date}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->payment->payment_method}}

                    </td>
                    <td class="px-6 py-4">  
                        {{$order->payment->payed}}

                    </td> 
                    <td class="px-6 py-4">  
                        {{$order->payment->reference}}

                    </td> 
                    <td class="px-6 py-4">  
                        {{$order->payment->street_address}}

                    </td> 
                    <td class="px-6 py-4">  
                        {{$order->payment->state}}

                    </td>
                     <td class="px-6 py-4">  
                        {{$order->payment->city}}

                    </td>
                     <td class="px-6 py-4">  
                        {{$order->payment->phone}}

                    </td> 
                    <td> 
                    </td>
                </tr>  
               
            </tbody>
        </table> 
         
    </div>
    @endif 
</div>
