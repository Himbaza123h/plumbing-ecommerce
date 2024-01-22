@extends('layouts.web.website')
@section('content') 
    <section class="h-screen mt-3  dark:bg-gray-900 ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl flex justify-center align-middle flex-col lg:py-16 z-10 relative">
            
            <div class="mt-20 lg:mt-32  md:mt-32">
                @if ($newProduct)  
                 <div class="w-full text-center">
                    <a href="{{route('product.view',$newProduct->slug)}}" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-mytext bg-myprimary-100 rounded-full dark:bg-myprimary dark:text-white ">
                        <span class="text-xs bg-myprimary rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">checkout the new product instock</span> 
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>                     
                @endif
             
                <div class="text-start break-before-all">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Exclusive Deals of plumbing materials  Collection</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-200">Explore different categories. Find the best deals.</p>
                </div>
                <div class="w-full max-w-md ">   
                    <div class="relative">
                        <a href="{{route('product.all')}}" class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 ">Find more products </a>
                    </div>
                </div>
            </div>

        </div> 
        <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-[#0000] w-full h-full absolute top-0 left-0 z-0"></div>
    </section> 
    <section class="dark:bg-gray-900 ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl flex justify-center align-middle flex-col lg:py-16 z-10 relative">
           @livewire('client.categories.category-component')
        </div> 
    </section>
    <section class="dark:bg-gray-900 ">
         @livewire('client.products.popular-products-component')
    </section>

    @include('layouts.web.footer')

    @endsection
