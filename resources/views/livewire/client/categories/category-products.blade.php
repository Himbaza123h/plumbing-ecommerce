<div class="w-[100%] py-24 px-12 flex-col justify-start items-center gap-24 inline-flex dark:bg-[#20232C]"> 
<div class=">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-lg mb-4 space-y-16">Products sorted from <strong>{{$category->name}}</strong></h2>
    @if ($category)
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        
            @forelse ($category->products as $item)
                    @include('client.includes.productCard') 
            @empty 
            @endforelse
        
        </div> 
   
    @endif
  </div>
</div>

</div>