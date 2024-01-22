<x-app-layout> 
    <div class="py-12">
        <div class="w-screen  sm:px-6 lg:px-8 space-y-6"> 
            <a href="/admin" class="rounded-full bg-myprimary text-white py-2 px-4">Main dashboad</a>
            <a href="{{route('orders.admin')}}" class="rounded-full border-2 border-myprimary bg-white text-mytext py-2 px-4">Orders</a>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">  
                @livewire('dashboard.orders.order-listing') 
            </div>  
        </div>
    </div>
</x-app-layout>
