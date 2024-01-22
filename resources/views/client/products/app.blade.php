@extends('layouts.web.website')
@section('content')   
    <section class="dark:bg-gray-900 ">  
          @livewire('client.products.product-list')  
     </section> 
    @include('layouts.web.footer')
    @endsection
