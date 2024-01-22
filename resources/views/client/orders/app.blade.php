<x-app-layout>
    @include('layouts.navigation')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>   
    <div class="py-12">
        <div class="w-screen  sm:px-6 lg:px-8 space-y-6"> 
            @if (session('success'))
                <div class="bg-green-300 text-green-800">
                    {{session('success')}}
                </div>
            @endif
              
            <a href="{{route('home')}}" class="rounded-full bg-myprimary text-white py-2 px-4">Site</a>
            <a href="{{route('order.client')}}" class="rounded-full border-2 border-myprimary bg-white text-mytext py-2 px-4">Orders</a>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">  
                @livewire('client.orders.order-listing') 
            </div>  
        </div>
    </div> 

</x-app-layout>
