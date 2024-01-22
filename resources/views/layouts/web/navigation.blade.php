
<nav class="bg-white dark:bg-gray-700 fixed w-full z-50 top-0 left-0 border-b border-gray-200  dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{route('home')}}" class="flex items-center">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-mytext dark:text-white text-transform: uppercase">Plumbing Hub</span>
    </a>
    <div class="flex md:order-2 gap-5">
      <div class="hidden lg:flex md:flex  gap-5 topRightNav "> 
        @livewire('client.cart.counting')
        <div class=""><a href="{{route('order.client')}}"><i class="fa-solid fa-bag-shopping"></i></a></div>
        <div class="">  
          @auth
          <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex justify-center text-center  w-8 h-8 text-lg bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 text-white dark:focus:ring-gray-600" type="button">
            UI 
          </button>
              <!-- Dropdown menu -->
              <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div>{{auth()->user()->name}}</div>
                    <div class="font-medium truncate">{{auth()->user()->email}}</div>
                  </div>
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    {{-- <li>
                      <a href="{{route('dashboard')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li> --}}
                    <li>
                      <a href="{{route('profile.edit')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                
                  </ul>
                  <div class="py-2">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </form>
                  </div>
              </div>
            @else 
            <a href="#" data-modal-target="popup-modal-login" data-modal-toggle="popup-modal-login" class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-4 py-2 ">Login</a>
          @endauth
       
        </div>
      </div>

      <button data-collapse-toggle="navbar-sticky" type="button" class=" inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false" id="Navbar__Link-toggle">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M1 1h15M1 7h15M1 13h15" />
          </svg> 
      </button>
      <button data-collapse-toggle="navbar-sticky" type="button" class="  inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false" id="Navbar__Link-toggle-close">
          <span class="sr-only">Open main menu</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg> 
      </button> 
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="Navbar__Items">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-700 md:dark:bg-gray-700 dark:border-gray-700">
      <li>
        <a href="{{route('home')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-300 md:p-0 md:dark:hover:text-gray-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
      </li> 
      <li>
        <a href="{{route('product.all')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-300 md:p-0 md:dark:hover:text-gray-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Products</a>
      </li>
      <li>
        <a href="#" class="flex gap-4 py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-300 md:p-0 md:dark:hover:text-gray-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 " id="dropdownHoverCategoriesButton" data-dropdown-toggle="dropdownHoverCategories" data-dropdown-trigger="hover">
          <div>Categories</div>
          <div class="mt-2">
              <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </div> 
        </a>
  
      </li>  
        <!-- Dropdown menu -->
        <div id="dropdownHoverCategories" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full lg:w-44 md:w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm h-80 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverCategoriesButton">
              @php
                  $categories= App\Models\Category::all();
                  
              @endphp
              @forelse ( $categories as $item)
                   <li>
                  <a href="{{route('category.view',$item->slug)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$item->name}}</a>
                  </li> 
              @empty
                  
              @endforelse
             
            </ul>
        </div> 
       {{-- <li>
        <a href="{{route('about')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-300 md:p-0 md:dark:hover:text-gray-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About us</a>
      </li>           --}}
    </ul>
  </div>
  </div>
</nav>

  <div class="flex lg:hidden z-30  gap-5 justify-between fixed bottom-0 bg-white p-5 w-[100%] border-b border-gray-200  shadow-2xl dark:bg-gray-900 dark:border-gray-600">
      <div class="">
        <a href="{{route('cart.view')}}"><i class="fa-solid fa-cart-shopping"></i> </a> 
      </div> 
      <div class=""> <a  href="{{route('order.client')}}"><i class="fa-solid fa-bag-shopping"></i></a> </div>
      <div class="" >
           @auth
          <button id="dropdownUserAvatarMobileButton" data-dropdown-toggle="dropdownAvatarMobile" class="flex justify-center text-center  w-8 h-8 text-lg bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 text-white dark:focus:ring-gray-600" type="button">
            UI 
          </button>
              <!-- Dropdown menu -->
              <div id="dropdownAvatarMobile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div>{{auth()->user()->name}}</div>
                    <div class="font-medium truncate">{{auth()->user()->email}}</div>
                  </div>
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarMobileButton">
                    {{-- <li>
                      <a href="{{route('dashboard')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li> --}}
                    <li>
                      <a href="{{route('profile.edit')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                
                  </ul>
                  <div class="py-2">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </form>
                  </div>
              </div>
            @else 
            <a href="#" data-modal-target="popup-modal-login" data-modal-toggle="popup-modal-login" class=""> <i class="fa-solid fa-user-tie"></i></a>
          @endauth
       
      </div> 
    </div>

