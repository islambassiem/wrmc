@props(['title', 'svg' => null])

<span
    class="flex items-center gap-2 border border-violet-400 rounded-md text-sm font-medium whitespace-nowrap py-2.5 px-3.5 duration-300 hover:bg-violet-100 hover:-translate-y-1">
    @if ($svg !== null)
        <img src="{{ $svg }}" alt="{{ $title }}" class="size-5">
    @endif
    <span class="text-violet-900">
        {{ $title }}
    </span>
</span>
