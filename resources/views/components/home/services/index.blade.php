@php
    $items = [
        [
            'title' => 'Family Medicine',
            'subitems' => [
                [
                    'title' => 'Routine medical care',
                    'svg' => 'routine_medical_care',
                ],
                [
                    'title' => 'Hypertension management',
                    'svg' => 'hypertension_management',
                ],
                [
                    'title' => 'Cold & flu treatment',
                    'svg' => 'cold_flu_treatment',
                ],
                [
                    'title' => 'Respiratory and asthma care',
                    'svg' => 'respiratory_and_asthma_care',
                ],
                [
                    'title' => 'Mental health support',
                    'svg' => 'mental_health_support',
                ],
                [
                    'title' => 'Joint pain assessment',
                    'svg' => 'joint_pain_assessment',
                ],
                [
                    'title' => 'Chronic Disease Management',
                    'svg' => 'chronic_disease_management',
                ],
                [
                    'title' => 'Diabetes',
                    'svg' => 'diabetes',
                ],
                [
                    'title' => 'Hypertension',
                    'svg' => 'hypertension',
                ],
                [
                    'title' => 'Asthma',
                    'svg' => 'asthma',
                ],
            ],
        ],
        [
            'title' => 'Skin Clinic',
            'subitems' => [
                [
                    'title' => 'Skin cancer screening',
                    'svg' => 'skin_cancer_screening',
                ],
                [
                    'title' => 'Skin lesion evaluation',
                    'svg' => 'skin_lesion_evaluation',
                ],
                [
                    'title' => 'Minor skin procedures',
                    'svg' => 'minor_skin_procedures',
                ],
            ],
        ],
        [
            'title' => 'Specialist & clinical services',
            'subitems' => [
                [
                    'title' => 'Paediatric Care',
                    'svg' => 'paediatric_care',
                ],
                [
                    'title' => 'Pap smear testing',
                    'svg' => 'pap_smear_testing',
                ],
                [
                    'title' => 'Cervical cancer screening',
                    'svg' => 'cervical_cancer_screening',
                ],
                [
                    'title' => 'Menstrual health concerns',
                    'svg' => 'menstrual_health_concerns',
                ],
                [
                    'title' => 'Prenatal and pregnancy follow-up',
                    'svg' => 'prenatal_and_pregnancy_follow-up',
                ],
            ],
        ],
        [
            'title' => 'Pediatric Care',
            'subitems' => [
                [
                    'title' => 'Child wellness exams',
                    'svg' => 'child_wellness_exams',
                ],
                [
                    'title' => 'Vaccinations and immunizations',
                    'svg' => 'vaccinations_and_immunizations',
                ],
                [
                    'title' => 'Circumcision services',
                    'svg' => 'circumcision_services',
                ],
            ],
        ],
        [
            'title' => 'Infusion & Specialized Care',
            'subitems' => [
                [
                    'title' => 'Iron infusions',
                    'svg' => 'iron_infusions',
                ],
                [
                    'title' => 'Pain management',
                    'svg' => 'pain_management',
                ],
                [
                    'title' => 'Wound care',
                    'svg' => 'wound_care',
                ],
                [
                    'title' => 'Catheter care',
                    'svg' => 'catheter_care',
                ],
                [
                    'title' => 'Pre-employment assessment',
                    'svg' => 'pre-employment_assessment',
                ],
                [
                    'title' => "Driver's license checks",
                    'svg' => "drivers_license_checks",
                ],
            ],
        ],
        [
            'title' => "Men's Health",
            'subitems' => [
                [
                    'title' => 'Preventive health screening',
                    'svg' => 'preventive_health_screening',
                ],
                [
                    'title' => "General men's health concerns",
                    'svg' => "general_mens_health_concerns",
                ],
            ],
        ],
    ];
@endphp


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
        @foreach ($items as $index => $item)
            <x-home.services.illness :index="$index" :title="$item['title']" :subitems="$item['subitems']" />
        @endforeach
    </div>

    <div class="flex flex-col items-center justify-center gap-4 mb-12">
        <span class="text-sm text-gray-600">
            * Bulk billing available for eligible Medicare patients
        </span>
    </div>
</section>
