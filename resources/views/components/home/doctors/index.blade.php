@php
    $doctors = [
        [
            'name' => 'Dr Ibrahim Elmezayen',
            'title' => 'GP, MBBS',
            'image' => 'https://wrmc.au/wp-content/uploads/2025/12/WhatsApp-Image-2026-03-24-at-11.47.51-AM-300x266.jpeg',
        ],
        [
            'name' => 'Dr Abul Khondaker',
            'title' => 'GP, MBBS, FRACGP',
            'image' => 'https://wrmc.au/wp-content/uploads/2025/12/Dr-Abul-Hashem-Khondaker-f-300x268.png',
        ],
        [
            'name' => 'Dr Htay Thaung',
            'title' => 'GP, MBBS, AMC, FRACGP',
            'image' => 'https://wrmc.au/wp-content/uploads/2025/12/Dr-Htay-F-300x270.png',
        ],
        [
            'name' => 'Dr Mohammad Hafiz',
            'title' => 'GP, MBBS, FRACGP',
            'image' => 'https://wrmc.au/wp-content/uploads/2026/03/Gemini_Generated_Image_jcslfajcslfajcsl-1-203x300.png',
        ],
    ];
@endphp

<section class="container mx-auto">
    <p class="my-10 text-violet-950 text-center text-6xl font-extrabold">Meet our Doctors</p>
    <p class="my-5 text-violet-950 text-center text-3xl font-semibold max-w-xl mx-auto">Dedicated & Experienced Team</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 place-items-center">
        @foreach ($doctors as $doctor)
            <x-home.doctors.doctor-card
                :name="$doctor['name']"
                :title="$doctor['title']"
                :image="$doctor['image']"
            />
        @endforeach
    </div>
</section>
