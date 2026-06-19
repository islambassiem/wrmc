@props(['title', 'subitems', 'index'])

<div class="border-b border-gray-200">
    <button type="button" class="w-full py-5 flex items-center justify-between text-left transition duration-300 hover:cursor-pointer hover:-translate-y-1"
        @click="active = active === {{ $index }} ? null : {{ $index }}">
        <span class="uppercase text-gray-600 font-semibold">
            {{ $title }}
        </span>

        <!-- Chevron -->
        <svg class="w-5 h-5 transition-transform duration-300 ease-in-out"
            :class="{ 'rotate-180': active === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="active === {{ $index }}" x-collapse.duration.500ms x-transition.opacity.duration.300ms
        class="overflow-hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pb-5">
            @foreach ($subitems as $item)
                <x-home.services.illness-card :title="$item['title']" :svg="$item['svg']" />
            @endforeach
        </div>
    </div>
</div>
