@extends('layouts.web.website')
@section('content')   
    <section class="dark:bg-gray-900 mt-[50px] h-screen w-full p-9">  
        @auth
        @livewire('client.cart.cart-data')
        @else
         <div class="flex flex-wrap justify-center  align-middle items-center gap-8 ">
            <div class="flex justify-center text-center"> 
               <div class="">You need to <a class="text-mytext underline underline-offset-2" href="{{route('login')}}">login</a></div> 
            </div>
         </div>
        @endauth
     </section>  
    @endsection
  
