@props(['name', 'title', 'image'])

<div
    class="flex flex-col h-full
           bg-white
           rounded-3xl
           shadow-lg
           p-5
           w-full
           max-w-xs
           mx-auto">

    <div class="aspect-square overflow-hidden rounded-2xl">
        <img src="{{ $image }}" alt="{{ $name }}"
            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
    </div>

    <p class="mt-4 text-lg font-semibold text-center">
        {{ $name }}
    </p>

    <p class="text-gray-600 text-center">
        {{ $title }}
    </p>

    <div class="flex gap-8 mx-auto mt-auto pt-4">
        <a href="#" target="_blank">
            <i class="fa-brands fa-square-instagram fa-xl duration-300 hover:text-violet-500"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fa-brands fa-facebook fa-xl duration-300 hover:text-violet-500"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fa-brands fa-x-twitter fa-xl duration-300 hover:text-violet-500"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fa-brands fa-linkedin fa-xl duration-300 hover:text-violet-500"></i>
        </a>
    </div>
</div>
