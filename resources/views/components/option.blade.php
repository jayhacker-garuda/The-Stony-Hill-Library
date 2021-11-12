@props([
    'title' => false,
    'value' => false
])


<div>
    <option
    {{ $attributes->merge() }}
    value="{{ $value }}">{{ $title  }}
</option>

</div>