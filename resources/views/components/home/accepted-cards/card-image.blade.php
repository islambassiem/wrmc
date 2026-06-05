@props(['url'])

@php
    $arrayPath = explode('/', Str::before($url, '.'));
@endphp

<div class="w-36 h-36 mt-5">
    <img src="{{ asset($url) }}"
        alt="{{ end($arrayPath) }}"
        class="w-full h-full object-contain rounded-full">
</div>

