@props(['services'])

<section class="container mx-auto scroll-mt-36" id="services">
    <p class="my-10 text-primary-950 text-center text-3xl md:text-5xl font-extrabold">Our services</p>
    <p class="my-5 text-primary-950 text-center text-xl md:text-3xl font-semibold max-w-xl mx-auto">We Treat These
        Conditions at
        Wembley Rd Medical Centre</p>
    <p class="my-5 text-primary-950 text-center text-md md:text-2xl font-bold">Our experienced GPs treat a wide range of
        conditions
        for patients of all ages. Click any condition to learn more.
    </p>

    <div class="flex flex-col mb-10 mx-5" x-data="{ active: null }">
        @foreach ($services as $index => $item)
            <x-home.services.illness :index="$index" :title="$item['name']" :subitems="$item['children']" />
        @endforeach
    </div>

    <div class="flex flex-col items-center justify-center gap-4 mb-12">
        <span class="text-sm text-gray-600">
            * Bulk billing available for eligible Medicare patients
        </span>
    </div>
</section>
