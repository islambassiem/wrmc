@props([
    'no',
    'title',
    'description'
])


<div class="flex flex-col gap-2 text-sm my-4">
    <div class="flex gap-1 items-center">
        <span class="size-5 bg-primary-200 rounded-full p-3 flex justify-center items-center text-primary-700 font-bold">
            {{ $no }}
        </span>
        <p class="font-bold">{{ $title }}</p>
    </div>
    <div class="ms-7">
        {{ $description }}
    </div>
</div>
