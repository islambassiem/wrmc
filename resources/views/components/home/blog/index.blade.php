@php
    $posts = [
        [
            'title' => 'Workplace Flu Vaccinations 2026 | Wembley Rd Medical Centre',
            'description' =>
                'Now Taking Enquiries for 2026 Workplace Flu Vaccination Programs As businesses prepare for the 2026 flu season in Australia, early planning is essential to protect...',
        ],
        [
            'title' => 'Allied Health & Support Services',
            'description' =>
                'Now Taking Enquiries for 2026 Workplace Flu Vaccination Programs As businesses prepare for the 2026 flu season in Australia, early planning is essential to protect...',
        ],
        [
            'title' => 'Telehealth & In-Person Appointments',
            'description' =>
                'Flexible Healthcare Options to Suit Your Needs At Wembley Rd Medical Centre, we offer both telehealth and in-person consultations, giving you choice and convenience in...',
        ],
        [
            'title' => 'Allied Health & Comprehensive Health Checks',
            'description' =>
                'Complete Healthcare Under One Roof At Wembley Rd Medical Centre, we provide comprehensive health assessments and allied health services to support your complete wellbeing. Our...',
        ],
    ];
@endphp

<section class="container  mx-auto bg-gray-50/50 mb-10">
    <h2 class="text-primary-900 font-extrabold text-3xl px-4">Healthcare Insights</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach ($posts as $post)
        <x-home.blog.card :title="$post['title']"
            :description="$post['description']" />
        @endforeach
    </div>
</section>
