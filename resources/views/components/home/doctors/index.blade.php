@php
    $doctors = [
        [
            'name' => 'Dr Ibrahim Elmezayen',
            'title' => 'GP, MBBS',
            'image' => asset('assets/images/staff/Ibrahim_Elmezayen.webp'),
        ],
        [
            'name' => 'Dr Abul Khondaker',
            'title' => 'GP, MBBS, FRACGP',
            'image' => asset('assets/images/staff/Abul-Hashem-Khondaker.webp'),
        ],
        [
            'name' => 'Dr Htay Thaung',
            'title' => 'GP, MBBS, AMC, FRACGP',
            'image' => asset('assets/images/staff/Htay_Thaung.webp'),
        ],
        [
            'name' => 'Dr Mohammad Hafiz',
            'title' => 'GP, MBBS, FRACGP',
            'image' => asset('assets/images/staff/Mohammad_Hafiz.webp'),
        ],
        [
            'name' => 'Dr Farzana Rahman',
            'title' => 'GP, MBBS, AMC, FRACGP',
            'image' => asset('assets/images/staff/Farzana_Rahman.webp'),
        ],
    ];
@endphp

<section class="container mx-auto">
    <p class="my-10 text-primary-950 text-center text-3xl md:text-5xl font-extrabold">Meet our Doctors</p>
    <p class="my-5 text-primary-950 text-center text-xl md:text-3xl font-semibold max-w-xl mx-auto">Dedicated & Experienced Team</p>

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-8">
        @foreach ($doctors as $doctor)
            <x-home.doctors.doctor-card
                :name="$doctor['name']"
                :title="$doctor['title']"
                :image="$doctor['image']"
            />
        @endforeach
    </div>
</section>
