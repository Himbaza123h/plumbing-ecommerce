<a href="{{route('product.view',$item->slug)}}" class="group">
    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
        <img  src="{{asset('storage/'.$item->cover)}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-400 font-medium">{{$item->name}}</h3>
    <small class="text-white bg-myprimary font-medium rounded-lg text-sm px-2">{{$item->category->name}}</small>
    <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">{{$item->currency}} {{$item->price}}</p>
</a>