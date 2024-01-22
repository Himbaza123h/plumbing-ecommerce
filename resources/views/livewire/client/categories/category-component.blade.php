 
<div class="flex justify-center items-center"> 
  <div class="w-full">
    <div class=" grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 jusitfy-center items-center space-y-10 gap-4">
      <div class="flex flex-col justify-center items-center "> 
        <div class="w-full flex flex-col justify-center text-center">
          <form  class="w-[100%]">
            <input wire:model="category" class=" md:w-[40%] lg:w-[40%] bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg  p-2.5  dark:placeholder-gray-400 dark:text-white dark:bg-gray-600 focus:border-myprimary focus:ring-myprimary" placeholder="Search category">
          </form>
          <div class=""> 
            <hr class="dark:hidden hidden">
          </div>
        </div> 
      </div>
      <div class="flex flex-row flex-wrap w-full gap-3">
        @forelse($categories as $item)  
          <a href="{{route('category.view',$item->slug)}}" class="justify-center items-center lg:flex rounded-lg shadow-sm border-1 border-gray-400   py-3 px-5 bg-[#CAF3E5]">
            <div class="flex flex-col align-middle items-center justify-center gap-5 ">
              <h2 class="text-xl dark:text-mytext text-mytext">{{$item->name}} </h2>             
            </div>
          </a>  
        @empty
        <a href="" class="justify-center items-center lg:flex rounded-lg  w-full border-1 border-gray-400  py-3 px-5 ">
           No results
          </a> 
        @endforelse
      </div> 
    </div>

  </div>
</div>