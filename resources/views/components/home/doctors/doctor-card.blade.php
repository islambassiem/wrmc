@props(['name', 'title', 'image'])

<a href="{{ route('doctor.show', Str::slug($name)) }}"
    class="flex flex-col h-full
           bg-white
           rounded-3xl
           shadow-lg
           p-5
           w-full
           max-w-xs
           mx-auto">

    <div class="aspect-square overflow-hidden rounded-2xl">
        <img src="{{ Storage::url($image ?? 'doctors/default.gif') }}" alt="{{ $name }}"
            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105 rounded-full">
    </div>

    <p class="mt-4 text-lg font-semibold text-center">
        {{ $name }}
    </p>

    <p class="text-gray-600 text-center">
        {{ $title }}
    </p>
</a>
