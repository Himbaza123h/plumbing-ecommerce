 <div class="relative overflow-x-auto sm:rounded-lg" wire:poll>
    @if (!empty($ordersListing)) 
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        OrderID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Customer 
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            order date 
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Status 
                        </div>
                    </th>  
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                             
                        </div>
                    </th> 
                </tr>
            </thead>
            <tbody>  
                @forelse ($ordersListing as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #order-{{$item->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->user?->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->created_at}}
                        </td>
                        <td class="px-6 py-4">  
                             @if ($item->status == 'pending')
                             <div class="flex gap-2"> 
                                <form wire:submit="CancelOrder({{$item->id}})"> 
                                    <button class="bg-red-100 text-red-900 text-xs font-medium mr-2 px-2.5 py-2.5 rounded-md " onclick="return confirm('Are you sure?')">Cancel order</button>
                                </form> 
                                 <form wire:submit.prevent="CheckOutOrder({{$item->id}})"> 
                                    <button class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-2.5 rounded-md dark:bg-blue-900 dark:text-blue-300" onclick="return confirm('Are you sure?')">Checkout order</button>
                                </form>
                            </div>
                                @elseif($item->status == 'paid')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Paid</span>
                                @elseif($item->status == 'failed')
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Failed</span>
                                @elseif($item->status == 'delivered')
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Delivery</span>
                            @endif  
                        </td> 
                        <td>
                            <a class="text-lg underline underline-offset-1" href="{{route('view.order.client',$item->id)}}">Open</a>
                        </td>
                    </tr> 
                @empty
                    
                @endforelse
               
            </tbody>
        </table> 
        @else
       
        <h1 class="text-xl text-mytext">No orders yet</h1>
            <a href="">{{'Back to main dashboad'}}</a>
   
    @endif
</div>  