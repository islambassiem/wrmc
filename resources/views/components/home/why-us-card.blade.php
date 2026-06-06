@props([
    'summery',
    'details'
])

<div
    x-data="{ open: false }"
    class="bg-white group rounded-4xl flex flex-col w-10/12 my-4 cursor-pointer "
>

    <p x-on:click="open = !open" class="text-center w-full p-4 shadow-sm hover:bg-gray-100">
        {{ $slot }}
        <span class="text-xl font-semibold hover:bg-gray-100">
            {{ $summery }}
            <i class="fa-solid fa-chevron-down fa-sm duration-500 text-primary-600" :class="open ? 'rotate-180' : '' "></i>
        </span>
    </p>

    <div
        x-show="open"
        x-collapse
        class="p-4"
    >
        {{ $details }}
    </div>
</div>
