<div class="" wire:ignore>   
    <div id="popup-modal-login" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                 
                <div class="flex flex-col gap-4 p-3 mt-5">
                    <h1 class="text=lg font-semibold">Login </h1> 
                    <form wire:submit.prevent="loginuser">
                        @if ($errorMessage)
                            {{$errorMessage}}
                        @endif
                        @csrf
                        <div class="mb-3">
                            <input type="email"
                                    name="email"
                                    autocomplete="true"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                    wire:model="email"
                                    class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" >
                            
                            @error('email')
                            <span class="text-red-600 invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        <div class=" mb-3">
                            <input type="password"
                                    name="password"
                                     autocomplete="true"
                                    placeholder="Password"
                                    wire:model="password"
                                    class="bg-gray-200  border-0 outline-0  text-gray-900 text-sm rounded-lg block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:bg-gray-600" >
                            
                            @error('password')
                            <span class="text-red-600 invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row gap-3">
                            <div class="col-md-12 mb-4"><p>If you don't have an account,<a href="{{route('register')}}" class="underline"> create new account</a></p></div>
                           
                            <div class="col-12 flex flex-wrap justify-between">
                                <button data-modal-hide="popup-modal-login" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-200 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-red-900 focus:z-10 dark:bg-red-700 dark:text-red-300 dark:border-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-600">No, cancel</button>
                                <button type="submit"  class="text-white bg-myprimary focus:ring-4 focus:outline-none focus:ring-secondary  hover:bg-secondary font-medium rounded-lg text-sm px-5 py-2.5 flex gap-1">Sign In</button>
                               
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
