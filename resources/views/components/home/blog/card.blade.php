@props(['title', 'slug', 'body'])

<a href="{{ route('post.show', $slug) }}" class="p-4">
    <div class="font-bold text-xl leading-8 py-5 duration-300 hover:text-primary-700">{{ $title }}</div>
    <div>{{ $body }}</div>
</a>
