@props(['title', 'subitems'])

<div class="mt-10">
    <div class="uppercase text-gray-400 font-semibold mt-5">{{ $title }}</div>
    <div class="border-b border-b-gray-200 mt-2 mb-4"></div>
    <div class="flex gap-4">
        @foreach ($subitems as $item)
            <x-home.services.illness-card :title="$item['title']" :svg="$item['svg']" />
        @endforeach
    </div>
</div>
