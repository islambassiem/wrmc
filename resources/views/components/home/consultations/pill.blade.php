@props(['title', 'svg' => null])

<span
    class="flex items-center gap-2 border border-primary-400 rounded-3xl  duration-150 text-sm font-medium whitespace-nowrap py-2.5 px-3.5 hover:bg-primary-100">
    @if ($svg !== null)
        <img src="{{ $svg }}" alt="{{ $title }}" class="size-5">
    @endif
    <span class="text-primary-900">
        {{ $title }}
    </span>
</span>
