<div>
    {{-- Be like water. --}}
    <div class="flex items-center w-screen h-screen justify-items-center">
        <div class="w-4/12 p-4 mx-auto bg-white rounded shadow-2xl">
            <div class="flex justify-between p-4 mb-2">
                <h3>Librarian Login</h3>
                <div>
                    <span>LOGO</span>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="flex items-center h-12 p-4 my-3 text-sm text-left text-white bg-green-500 rounded-md"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="w-6 h-6 mx-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="flex items-center h-12 p-4 my-3 text-sm text-left text-white bg-red-500 rounded-md"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="w-6 h-6 mx-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif
            <div class="flex justify-center">
                   <div class="space-y-4">
                        <div class="flex flex-col">
                            <x-input placeholder="Email Address" type="email" wire:model='user.email' :errors="$errors->first('user.email')" />
                        </div>
                        <div class="flex flex-col">
                           <x-input placeholder="Password" type="password" wire:model='password' :errors="$errors->first('password')" />
                        </div>

                        <div class="flex flex-col">
                            <button type="button" wire:click="donLogin" class="p-2 font-black transition-colors duration-200 bg-pink-400 rounded shadow text-cool-gray-100 focus:bg-pink-600 hover:bg-pink-600">Login</button>
                        </div>

                        <p class="text-center">Train your mind to see the good in every situation</p>
                   </div>
            </div>
        </div>
    </div>
</div>
