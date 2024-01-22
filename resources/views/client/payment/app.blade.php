@extends('layouts.web.website')
@section('content')   
    <section class="dark:bg-gray-900 "> 
     @if (!empty($order)) 
        @if (session('error'))
        <div class="bg-red-200 text-red-600"> {{session('error')}}</div>
           
        @endif
        <div class="w-[100%] py-24 px-12 flex-col justify-start items-left gap-24 inline-flex dark:bg-[#20232C]">
               <form method="post" action="{{route('payment.redirect')}}" class="justify-center items-center flex flex-col w-[1/2] gap-4">
                @csrf    
                <div class=" text-xl lg:text-4xl md:text-4xl font-bold   dark:text-gray-300 text-mytext" >Billing information</div> 
                    <div class="w-[50%]"> 
                        <label>Phone</label>
                        <input type="tel" name="phone" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" required>
                    </div>
                    <div class="w-[50%]"> 
                        <label>Street address</label>
                        <input type="text" name="street_address" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" required>
                    </div>
                    <div class="w-[50%]"> 
                        <label>House address</label>
                        <input type="text" name="house_address" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" required>
                    </div> 
                    <div class="w-[50%]"> 
                        <label>City</label>
                        <input type="text" name="city" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" required>
                    </div>
                    <div class="w-[50%]"> 
                        <label>State</label>
                        <input type="text" name="state" class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-9 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" required>
                    </div>
                   <div>
                    <button class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 flex gap-1">Continue to payment</button>
                   </div>
                </form>  
          </div> 
     @endif
     </section> 
    @include('layouts.web.footer')
    @endsection
