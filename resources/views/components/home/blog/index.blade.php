<section class="container  mx-auto bg-gray-50/50 mb-10 scroll-mt-36" id="blog">
    <h2 class="text-primary-900 font-extrabold text-3xl px-4">Healthcare Insights</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach ($posts as $post)
        <x-home.blog.card
            :title="$post['title']"
            :slug="$post['slug']"
            :body="$post['body']"
            :thumbnail="$post['thumbnail']"
            />
        @endforeach
    </div>
</section>
