<x-layouts.page>
    <section class="pt-36 md:pt-25 lg:pt-36 lg:my-5">
        <div class="container mx-auto grid grid-col-1 lg:grid-cols-12">
            <div class="mx-4 lg:col-span-9">
                <h1 class="text-4xl sm:text-3xl md:text-5xl font-bold font-serif">{{ $post->title }}</h1>
                <div class="flex flex-col gap-2 md:flex-row md:mt-5">
                    <h3 class="text-xs text-gray-600 flex items-center gap-1">
                        <i class="fa-solid fa-clock fa-md text-black"></i>
                        Updated at: {{ $post->updated_at->format('d M Y') }}
                    </h3>
                </div>
                <div class="my-5">{!! $post->body !!}</div>
            </div>
            @if ($related->count())
                <div class="lg:col-span-3">
                    <h4 class="font-bold text-xl mx-4">Related Posts</h4>
                    <div class="mb-10 mx-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
                        @foreach ($related as $post)
                            <a href="{{ route('post.show', $post->slug) }}" class="block border-b border-gray-200 p-4  rounded-md hover:bg-gray-50 ">
                                <p>{{ $post->title }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layouts.page>
