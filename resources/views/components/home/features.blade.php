@php
    $features = [
        [
            'icon' => 'fa-solid fa-bed-pulse',
            'color' => 'blue',
            'title' => 'Patient Centred and Holistic Care',
            'description' =>
                "We're committed to delivering comprehensive, patient-centred care that puts you and your family's health first",
        ],
        [
            'icon' => 'fa-solid fa-hospital',
            'color' => 'teal',
            'title' => 'Allied Health & Comprehensive Health Checks',
            'description' => 'We provide comprehensive health assessments and allied health services under one roof',
        ],
        [
            'icon' => 'fa-solid fa-phone-volume',
            'color' => 'red',
            'title' => 'Telehealth & In-Person Appointments',
            'description' =>
                'Consult via phone or video for follow-ups, prescriptions, mental health, medical certificates.',
        ],
    ];
@endphp

<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-serif text-4xl lg:text-5xl font-normal text-gray-900 mb-4">
                Why Choose Wembley RD?
            </h2>
            <p class="text-xl text-gray-600">
                Wembley Rd Medical Centre combines compassionate,
                high-quality healthcare with experienced practitioners,
                accessible appointments,
                and comprehensive medical services tailored to the needs of individuals and families.

            </p>
        </div>

        {{-- Features Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($features as $index => $feature)
                <div class="group flex flex-col items-center text-center p-8 bg-white border border-gray-200 rounded-2xl hover:border-{{ $feature['color'] }}-600 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 animate-fade-in-up"
                    style="animation-delay: {{ $index * 100 }}ms">
                    <div
                        class="w-14 h-14 text-{{ $feature['color'] }}-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="{{ $feature['icon'] }} fa-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
