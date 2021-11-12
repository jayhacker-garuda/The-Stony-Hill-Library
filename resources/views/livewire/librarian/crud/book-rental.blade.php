<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container w-screen h-screen p-4 mx-auto overflow-y-auto pt-28">
        <div class="flex flex-col space-y-10">
            <div class="flex items-center justify-center px-4 md:p-0">
                <div class="w-6/12 h-auto bg-white shadow-2xl rounded-2xl">
                    <div class="flex flex-col items-center justify-center p-4 mx-auto space-y-4">


                        <div class="flex flex-col">
                            <label for="" class="mb-2 font-black text-center">Members:</label>
                            <x-select wire:model='rental.member_id' :errors="$errors->first('rental.member_id')">
                                <x-option disable selectd title="-- Choose --"></x-option>
                                @foreach ($members as $member)
                                    <x-option value="{{ $member->id }}" title="{{ $member->name }}"></x-option>
                                @endforeach
                            </x-select>
                        </div>
                        @if ($rental->member_id)
                            <div class="flex flex-col">
                                <label for="" class="mb-2 font-black text-center">Books:</label>
                                <x-select wire:model='rental.book_id' :errors="$errors->first('rental.book_id')">
                                    <x-option disable selectd title="-- Choose --"></x-option>
                                    @foreach ($books as $book)
                                        <x-option value="{{ $book->id }}" title="{{ $book->title }}"></x-option>
                                    @endforeach
                                </x-select>
                            </div>
                        @endif
                           
                        @if($rental->book_id)
                            <div class="flex flex-col">
                            @if ($editMode)
                                <button class="px-4 py-2 bg-purple-500 rounded-md"
                                    wire:click='updateRental({{ $editMode->id }})'>Update</button>
                            @else
                                <button class="px-4 py-2 bg-teal-500 rounded-md" wire:click='addRental'>Add</button>
                            @endif
                        </div>
                        @endif
                        <div class="flex flex-col">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center px-4 md:p-0">
                <div class="w-full h-auto bg-white shadow-2xl rounded-2xl">
                    <!-- Member Table -->
                    <div class="flex items-center justify-center">
                        <table class="items-center w-full bg-transparent border-collapse rounded-md shadow-md ">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">

                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Member Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Book Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Date Rented
                                    </th>

                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Return Date [14 DAYS]
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-left text-teal-500 uppercase align-middle border border-l-0 border-r-0 border-teal-100 border-solid bg-teal-50 whitespace-nowrap">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr
                                        class="transition-colors duration-200 bg-teal-200 hover:bg-teal-300 focus:bg-teal-300">
                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->id }}
                                        </th>
                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->member->name }}
                                        </th>
                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->book->title }}
                                        </th>
                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->status }}
                                        </th>
                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->created_at }}
                                        </th>

                                        <th
                                            class="p-4 px-6 text-xs text-left text-teal-700 align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                            {{ $rental->return_date }}
                                        </th>
                                        <td
                                            class="p-4 px-6 space-x-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                            {{-- <div class="flex flex-row"> --}}

                                            <a href="javascript:void(0)" wire:click='editRental({{ $rental->id }})'
                                                class="p-2 font-black text-white uppercase transition-colors duration-150 bg-green-400 rounded-md hover:bg-green-600 focus:bg-green-600">Edit</a>
                                            <a href="javascript:void(0)"
                                                wire:click='deleteRental({{ $rental->id }})'
                                                class="p-2 font-black text-white uppercase transition-colors duration-150 bg-red-400 rounded-md hover:bg-red-600 focus:bg-red-600">Delete</a>
                                            {{-- </div> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <tfoot class="flex flex-col pt-10">
                        <div>
                            {{ $rentals->links() }}
                        </div>
                    </tfoot>
                    <!-- End rental Table -->
                </div>
            </div>
        </div>
    </div>
</div>
