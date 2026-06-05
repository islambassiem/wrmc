@props(['title', 'svg' => null])

<span
    class="flex flex-col md:flex-row items-center gap-2 min-w-0 border border-violet-400 rounded-md text-sm font-medium py-2.5 px-3.5 duration-300 hover:bg-violet-100 hover:-translate-y-1">
    @if ($svg !== null)
        <img src="{{ $svg }}" alt="{{ $title }}" class="size-5 shrink-0">
    @endif
    <span class="text-violet-900 break-all">
        {{ $title }}
    </span>
</span>
