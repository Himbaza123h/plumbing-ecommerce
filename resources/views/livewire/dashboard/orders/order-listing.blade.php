 <div class="relative overflow-x-auto sm:rounded-lg" ll>
    <input type="text" wire:model="order" class="border px-2 py-1 block w-full" placeholder="Search order by customer name or oder id">

    @if (!empty($ordersListing)) 
    <div class="mt-5 flex gap-2" wire:loading > <x-loading/> Loading data</div> 
        <table wire:loading.remove class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                            {{$item->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->created_at}}
                        </td>
                        <td class="px-6 py-4">  
                             @if ($item->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                @elseif($item->status == 'paid')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Paid</span>
                                @elseif($item->status == 'failed')
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Failed</span>
                                @elseif($item->status == 'delivered')
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Delivery</span>
                            @endif  
                        </td> 
                        <td>
                            <a class="text-lg underline underline-offset-1" href="{{route('view.order.admin',$item->id)}}">Open</a>
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