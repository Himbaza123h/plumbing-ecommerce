<x-app-layout> 
    <div class="py-12">
     
        <div class="w-screen  sm:px-6 lg:px-8 space-y-6">
              <a href="/admin" class="rounded-full bg-myprimary text-white py-2 px-4">Main dashboad</a>
        <a href="{{route('orders.admin')}}" class="rounded-full border-2 border-myprimary bg-white text-mytext py-2 px-4">Orders</a>
           
            <div class="p-4 sm:p-8"> 
                @if (!empty($order))
                <div class="flex">
                    <div class="flex-1">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">#Order-{{$order->id}}</h5>
            
                    </div>
                    <div class=""> 
                        @if ($order->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                            @elseif($order->status == 'paid')
                             <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Paid</span>
                            @elseif($order->status == 'failed')
                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Failed</span>
                            @elseif($order->status == 'delivered')
                             <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Delivery</span>
                        @endif  
                    </div>
                </div> 
                    @livewire('dashboard.orders.order-viewing',['order'=>$order])  
                @else
                No order data
                    
                @endif
            </div>  
        </div>
    </div>
</x-app-layout>
