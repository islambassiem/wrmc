@props(['title', 'image' => null])

<span class="flex items-center gap-3
           w-full
           border border-primary-400
           rounded-lg
           p-4
           text-primary-900
           hover:bg-primary-50
           transition-all duration-300">
    @if ($image)
        <img src="{{ asset('storage/' . $image) }}" alt="img" class="size-8">
    @endif

    <span>
        {{ $title }}
    </span>
</span>
