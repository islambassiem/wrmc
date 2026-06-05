@php
    $stats = [
        [
            'icon' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f3e5.svg',
            'number' => 47,
            'label' => 'Years serving Logan families',
        ],
        [
            'icon' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f4c5.svg',
            'number' => 7,
            'label' => 'Days open inc. weekends',
        ],
        [
            'icon' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fa7a.svg',
            'number' => 'FRACGP',
            'label' => 'Accredited GPs on team',
        ],
        [
            'icon' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f48a.svg',
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
                        <img src="{{ $stat['icon'] }}" alt="{{ $stat['label'] }}">
                    </div>
                    <div class="font-serif text-4xl font-normal text-blue-600 mb-2">{{ $stat['number'] }}</div>
                    <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
