@extends('layouts.web.website')
@section('content') 
    <section class="h-screen mt-3  dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl flex justify-center align-middle flex-col lg:py-16 z-10 relative">
            
            <div class="mt-20 lg:mt-32  md:mt-32  "> 
                <div class="text-start break-before-all">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">About us</h1>
                       </div> 
            </div>

        </div> 
        <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-[#0000] w-full h-full absolute top-0 left-0 z-0"></div>
    </section>  

    @include('layouts.web.footer')
    
    @endsection
