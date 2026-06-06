@props(['title', 'svg' => null])

<span
    class="flex items-center gap-3
           w-full
           border border-primary-400
           rounded-lg
           p-4
           text-primary-900
           hover:bg-primary-50
           transition-all duration-300">
    @if ($svg)
        <img src="{{ $svg }}" alt="{{ $title }}" class="size-5 shrink-0">
    @endif

    <span>
        {{ $title }}
    </span>
</span>
