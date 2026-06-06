@php
    $pills = [
        [
            'title' => 'Cardiology',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fac0.svg',
        ],
        [
            'title' => ' Endocrinology',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f52c.svg',
        ],
        [
            'title' => 'Dermatology',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9f4.svg',
        ],
        [
            'title' => 'General Surgery',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1fa7a.svg',
        ],
        [
            'title' => 'Neurology',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f9e0.svg',
        ],
        [
            'title' => 'Paediatrics',
            'svg' => 'https://s.w.org/images/core/emoji/17.0.2/svg/1f476.svg',
        ],
        [
            'title' => '+ more specialties',
        ],
    ];
@endphp


<section class="container mx-auto bg-primary-50/50 min-h-96 mb-10 border-t-2 border-t-primary-600">
    <div class="max-w-6xl flex flex-col lg:flex-row justify-around items-center">
        {{-- Left --}}
        <div class="flex-1 m-10">
            {{-- badge --}}
            <div
                class="inline-flex items-center gap-1.5 bg-primary-50 text-primary-800 border border-primary-400 text-sm font-semibold py-2.5 px-3 rounded-3xl mb-3.5 tracking-wide">
                ✦ Now at WRMC
            </div>

            <h2 class="text-3xl font-bold">Specialist consultations — <br><span class="text-primary-600">closer to home for
                    Logan families</span></h2>
            <p class="text-lg py-4 text-justify text-primary-950">WRMC is now accepting specialist referrals from GPs and
                allied health providers across Logan and Brisbane
                South. No need to travel to the city — quality specialist care in a clinic your patients already know
                and trust.</p>

            <div class="flex flex-wrap gap-3 ">
                @foreach ($pills as $pill)
                    <x-home.consultations.pill :title="$pill['title']" :svg="$pill['svg'] ?? null" />
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="flex flex-col lg:flex-row gap-5 mt-10">
                <a
                    href="#"
                    class="flex items-center justify-center grow gap-2 rounded-xl border bg-primary-700 text-white font-bold text-lg h-12 p-y-3  duration-300 hover:bg-primary-800  hover:-translate-y-1"
                >
                    View all specialist services
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a
                    href="#"
                    class="flex items-center justify-center grow gap-2 rounded-xl border border-primary-600 text-primary-950 font-bold text-lg h-12 p-y-3   duration-300 hover:-translate-y-1"
                >
                    <i class="fa-solid fa-phone"></i>
                     Call to discuss a referral
                </a>
            </div>
        </div>


        {{-- Right --}}
        <div class="bg-white shrink-0 w-80 my-10 p-4 shadow-sm rounded-xl border border-primary-400">
            {{-- Title --}}
            <p class="flex items-center gap-3 mb-5">
                <img src="https://s.w.org/images/core/emoji/17.0.2/svg/1f3e5.svg" alt="health-professionals"
                    class="size-5">
                <span class="uppercase tracking-wide text-primary-700 font-semibold text-base">For GPs & Health
                    Professionals</span>
            </p>

            {{-- Steps --}}
            <x-home.consultations.step no="1" title="Send your referral"
                description="By phone, fax, or electronic referral" />
            <x-home.consultations.step no="2" title="We contact your patient"
                description="Our team coordinates appointment & prep" />
            <x-home.consultations.step no="3" title="Full report back to you"
                description="Consultation notes sent to your practice" />

            <div class="border-b border-primary-100 "></div>

            {{-- Referral enquiries --}}
            <div class="mt-2">
                <strong>Referral enquiries:</strong><br>
                📞 <a href="tel:0734128333">(07) 3412 8333</a><br>
                ✉️ <a href="mailto:wrmc4114@gmail.com">wrmc4114@gmail.com</a><br>
                📍 90 Wembley Rd, Logan Central QLD 4114
            </div>
        </div>
    </div>
</section>
