@props(['name', 'title', 'image'])

<div class="flex flex-col bg-gray-50 p-5 my-2 rounded-3xl shadow-xl">
    <div class="w-60 h-60 mx-auto overflow-hidden rounded-xl shadow-md bg-white">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
    </div>

    <p class="mt-4 text-lg font-semibold">{{ $name }}</p>
    <p class="text-gray-600">{{ $title }}</p>

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
