@props([
    'errors' => false
])

@php
    $classes = ($errors ?? false) 
    ? 'form-select border border-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600'
    : 'form-select border border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent'
@endphp

<div>
    <select
    {{ $attributes->merge([
        'class' => $classes
    ]) }} 
    >
        {{ $slot }}
</select>

    @if ($errors)
        <div class="m-1 font-thin text-red-600">
            {{ $errors }}
        </div>
    @endif
    
</div>