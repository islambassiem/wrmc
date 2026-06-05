@php
    $items = [
        [
            'title' => 'Common illnesses',
            'subitems' => [
                [
                    'title' => 'Cold & Flu',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f927.svg',
                ],
                [
                    'title' => 'Ear Infections',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f442.svg',
                ],
                [
                    'title' => 'Eye Infections',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f441.svg',
                ],
                [
                    'title' => 'Sore Throat',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9b7.svg',
                ],
                [
                    'title' => 'Respiratory Infections',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fac1.svg',
                ],
                [
                    'title' => 'Fever Management',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f321.svg',
                ],
            ],
        ],
        [
            'title' => 'Chronic & ongoing conditions',
            'subitems' => [
                [
                    'title' => 'Asthma',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fac0.svg',
                ],
                [
                    'title' => 'Diabetes Management',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fa78.svg',
                ],
                [
                    'title' => 'Blood Pressure',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f48a.svg',
                ],
                [
                    'title' => 'Mental Health',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9e0.svg',
                ],
                [
                    'title' => 'Joint Pain',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9b4.svg',
                ],
                [
                    'title' => 'Back Pain',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f519.svg',
                ],
            ],
        ],
        [
            'title' => 'Specialist & clinical services',
            'subitems' => [
                [
                    'title' => 'Paediatric Care',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f476.svg',
                ],
                [
                    'title' => "Women's Health",
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f469.svg',
                ],

                [
                    'title' => "Men's Health",
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f468.svg',
                ],
                [
                    'title' => 'Family Medicine',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f46a.svg',
                ],
                [
                    'title' => 'Travel Vaccinations',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/2708.svg',
                ],
                [
                    'title' => 'Immunisations',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f489.svg',
                ],
            ],
        ],
        [
            'title' => 'Family & preventive care',
            'subitems' => [
                [
                    'title' => 'Skin Checks',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f52c.svg',
                ],
                [
                    'title' => 'Skin Lesions',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fa79.svg',
                ],
                [
                    'title' => 'Work Medicals',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9ba.svg',
                ],
                [
                    'title' => 'Urgent Care',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f691.svg',
                ],
                [
                    'title' => 'Minor Injuries',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fa7b.svg',
                ],
                [
                    'title' => 'Pain Relief',
                    'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f486.svg',
                ],
            ],
        ],
    ];
@endphp


<section class="container mx-auto">
    <p class="my-10 text-violet-950 text-center text-6xl font-extrabold">Our services</p>
    <p class="my-5 text-violet-950 text-center text-3xl font-semibold max-w-xl mx-auto">We Treat These Conditions at
        Wembley Rd Medical Centre</p>
    <p class="my-5 text-violet-950 text-center text-2xl font-bold">Our experienced GPs treat a wide range of conditions
        for patients of all ages. Click any condition to learn more.
    </p>

    <div class="flex flex-col mb-10">
        @foreach ($items as $item)
            <x-home.services.illness :title="$item['title']" :subitems="$item['subitems']" />
        @endforeach
    </div>

    <div class="flex flex-col items-center justify-center gap-4 mb-12">
        <a href="/"
            class="group inline-flex items-center justify-center gap-2 bg-violet-600 hover:bg-violet-700 text-white font-semibold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            View all conditions & services
            <i class="fa-solid fa-arrow-right"></i>
        </a>
        <span class="text-sm text-gray-400">
            * Bulk billing available for eligible Medicare patients
        </span>
    </div>
</section>
