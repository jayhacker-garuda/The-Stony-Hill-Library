@props([
    'alpname' => false,
    'modalTitle' => false,
    'btnName' => false
])

<div x-data="{ {{ $alpname }} : false }">
    <button @click=" {{ $alpname }} = true" class="relative inline-block group">
  <span class="absolute inset-0 transition-transform transform translate-x-1 translate-y-1 bg-pink-600 group-hover:translate-y-0 group-hover:translate-x-0"></span>
  <span class="relative inline-block px-5 py-3 font-medium text-pink-600 bg-white border-2 border-current">
    {{ $btnName }}
  </span>
</button>
    <div
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        x-show="{{ $alpname }}"
        class="fixed inset-0 z-20 flex items-center justify-center px-4 bg-black bg-opacity-75 md:px-0">
        <div class="flex flex-col p-4 bg-white border-2 border-gray-400 rounded-lg shadow-2xl">
        <div class="flex justify-between mb-4">
            <h3 class="text-2xl font-bold">{{ $modalTitle }}</h3>
            <button @click=" {{ $alpname }} = false">Close</button>
        </div>
        {{ $slot }}
    </div>
    </div>
</div>
