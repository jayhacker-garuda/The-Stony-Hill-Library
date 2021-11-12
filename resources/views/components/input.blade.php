@props([
    'errors' => false,
    'placeholder' => false,
    'type' => 'text'
])


@php
    $classes = ($errors ?? false)
        ? 'form-input w-full p-4 pr-12 text-sm border border-red-400 rounded-lg shadow-sm'
        : 'form-input w-full focus:ring-2 focus:ring-blue-600'
@endphp

<div>
    <input
    {{ $attributes->merge([
        'class' => $classes
    ]) }} 
    placeholder="{{ $placeholder }}"
    type="{{ $type }}">

    @if ($errors)
        <div class="m-1 font-thin text-red-600">
            {{ $errors }}
        </div>
    @endif
    
</div>