<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <header class="fixed w-full shadow-lg" style="background-image: url({{ url('/storage/bg/books_3-wallpaper-1366x768.jpg') }})">
  <div class="max-w-screen-xl p-4 mx-auto">
    <div class="flex items-center justify-between space-x-4 lg:space-x-10">
      <div class="flex lg:w-0 lg:flex-1">
        <span class="w-20 h-10 bg-gray-200 rounded-lg"></span>
      </div>

      <nav class="hidden space-x-8 text-sm font-medium md:flex">
        <a class="p-4 bg-white rounded-full text-cool-gray-600" href="{{ route('librarian.dashboard') }}">Dashboard</a>
        <a class="p-4 bg-white rounded-full text-cool-gray-600" href="{{ route('librarian.add.book') }}">Add Books</a>
        <a class="p-4 bg-white rounded-full text-cool-gray-600" href="{{ route('librarian.add.member') }}">Add Members</a>
        <a class="p-4 bg-white rounded-full text-cool-gray-600" href="{{ route('librarian.book.rental') }}">Book`s Rental</a>
      </nav>

      <div class="items-center justify-end flex-1 hidden space-x-4 sm:flex">
        <a class="px-5 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-lg" href="">{{ Auth::user()->name }}</a>

        <a wire:click='donLogout' class="px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg" href="javascript:void(0)">Logout</a>
      </div>

      <div class="lg:hidden">
        <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" type="button">
          <span class="sr-only">Open menu</span>
          <svg
            aria-hidden="true"
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewbox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</header>

</div>
