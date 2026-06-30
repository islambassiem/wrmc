@php
    $stats = [
        [
            'icon' => 'hospital.svg',
            'number' => 45,
            'label' => 'Years serving Logan families',
        ],
        [
            'icon' => 'calendar.svg',
            'number' => 7,
            'label' => 'Days open inc. weekends',
        ],
        [
            'icon' => 'RACGP.jpg',
            'number' => 'RACGP',
            'label' => 'Accredited GPs on team',
        ],
        [
            'icon' => 'Medicare-Bulk-BIlling-Practice.webp',
            'number' => 'Bulk',
            'label' => 'Billing available eligible patients',
        ],
    ];
@endphp


<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($stats as $index => $stat)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 text-center animate-fade-in-up"
                    style="animation-delay: {{ $index * 100 }}ms">
                    <div class="w-12 h-12 mx-auto mb-4 text-blue-600">
                        <img src="{{ asset('assets/images/stats/' . "{$stat['icon']}") }}" class="size-12" />
                    </div>
                    <div class="font-serif text-4xl font-normal text-blue-600 mb-2">{{ $stat['number'] }}</div>
                    <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
