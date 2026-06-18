@props(['title', 'slug', 'thumbnail', 'body'])

<a href="{{ route('post.show', $slug) }}" class="p-4 flex items-center gap-4 ">
    <img src="{{ $thumbnail }}" alt="{{ $slug }}" class="w-24 h-24 object-cover rounded-xl shadow-2xl">
    <div>
        <div class="font-bold text-xl leading-8 py-5 duration-300 hover:text-primary-700">{{ $title }}</div>
        <div>{{ $body }}</div>
    </div>
</a>
