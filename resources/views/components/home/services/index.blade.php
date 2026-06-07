@php
    $items = [
        [
            'title' => 'Common illnesses',
            'subitems' => [
                [
                    'title' => 'Cold & Flu',
                    'svg' => 'cold-flu',
                ],
                [
                    'title' => 'Ear Infections',
                    'svg' => 'ear-infections',
                ],
                [
                    'title' => 'Eye Infections',
                    'svg' => 'eye-infections',
                ],
                [
                    'title' => 'Sore Throat',
                    'svg' => 'sore-throat',
                ],
                [
                    'title' => 'Respiratory Infections',
                    'svg' => 'respiratory-infections',
                ],
                [
                    'title' => 'Fever Management',
                    'svg' => 'fever-management',
                ],
            ],
        ],
        [
            'title' => 'Chronic & ongoing conditions',
            'subitems' => [
                [
                    'title' => 'Asthma',
                    'svg' => 'asthma',
                ],
                [
                    'title' => 'Diabetes Management',
                    'svg' => 'diabetes-management',
                ],
                [
                    'title' => 'Blood Pressure',
                    'svg' => 'blood-pressure',
                ],
                [
                    'title' => 'Mental Health',
                    'svg' => 'mental-health',
                ],
                [
                    'title' => 'Joint Pain',
                    'svg' => 'joint-pain',
                ],
                [
                    'title' => 'Back Pain',
                    'svg' => 'back-pain',
                ],
            ],
        ],
        [
            'title' => 'Specialist & clinical services',
            'subitems' => [
                [
                    'title' => 'Paediatric Care',
                    'svg' => 'pediatric-care',
                ],
                [
                    'title' => "Women's Health",
                    'svg' => 'womens-health',
                ],

                [
                    'title' => "Men's Health",
                    'svg' => 'mens-health',
                ],
                [
                    'title' => 'Family Medicine',
                    'svg' => 'family-medicine',
                ],
                [
                    'title' => 'Travel Vaccinations',
                    'svg' => 'travel-vaccinations',
                ],
                [
                    'title' => 'Immunisations',
                    'svg' => 'immunisations',
                ],
            ],
        ],
        [
            'title' => 'Family & preventive care',
            'subitems' => [
                [
                    'title' => 'Skin Checks',
                    'svg' => 'skin-checks',
                ],
                [
                    'title' => 'Skin Lesions',
                    'svg' => 'skin-lesions',
                ],
                [
                    'title' => 'Work Medicals',
                    'svg' => 'work-medicals',
                ],
                [
                    'title' => 'Urgent Care',
                    'svg' => 'urgent-care',
                ],
                [
                    'title' => 'Minor Injuries',
                    'svg' => 'minor-injuries',
                ],
                [
                    'title' => 'Pain Relief',
                    'svg' => 'pain-relief',
                ],
            ],
        ],
    ];
@endphp


<section class="container mx-auto">
    <p class="my-10 text-primary-950 text-center text-3xl md:text-5xl font-extrabold">Our services</p>
    <p class="my-5 text-primary-950 text-center text-xl md:text-3xl font-semibold max-w-xl mx-auto">We Treat These Conditions at
        Wembley Rd Medical Centre</p>
    <p class="my-5 text-primary-950 text-center text-md md:text-2xl font-bold">Our experienced GPs treat a wide range of conditions
        for patients of all ages. Click any condition to learn more.
    </p>
    {{-- {!!  (file_get_contents(resource_path("svg/cold-flu.svg"))) !!} --}}
    <div class="flex flex-col mb-10 mx-5">
        @foreach ($items as $item)
            <x-home.services.illness :title="$item['title']" :subitems="$item['subitems']" />
        @endforeach
    </div>

    <div class="flex flex-col items-center justify-center gap-4 mb-12">
        <a href="/"
            class="group inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            View all conditions & services
            <i class="fa-solid fa-arrow-right"></i>
        </a>
        <span class="text-sm text-gray-400">
            * Bulk billing available for eligible Medicare patients
        </span>
    </div>
</section>
