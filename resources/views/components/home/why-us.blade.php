<section class="container mx-auto bg-gray-50 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="p-3">
            <img src="{{ asset('assets/images/why-us.webp') }}" alt="">
        </div>
        <div class="flex flex-col items-center justify-center">
            <p class="my-10 text-4xl text-violet-500">WHY US</p>

            <x-home.why-us-card summery="45+ Years of Trusted Care"
                details="Experienced GPs delivering comprehensive healthcare with clinical excellence and genuine compassion">
                <i class="fa-solid fa-user-shield text-violet-600"></i>
            </x-home.why-us-card>

            <x-home.why-us-card summery="Medical Excellence, Every Visit"
                details="Fully accredited general practice delivering evidence-based medicine, comprehensive care, and quality outcomes for Logan Central families.">
                <i class="fa-solid fa-award text-violet-600"></i>
            </x-home.why-us-card>

            <x-home.why-us-card summery="In-Clinic or Telehealth - We're Here for You"
                details="Comprehensive healthcare delivered your way. Choose face-to-face consultations at our modern Logan Central clinic or convenient telehealth appointments from home. Quality care, flexible options.">
                <i class="fa-solid fa-heart-pulse text-violet-600"></i>
            </x-home.why-us-card>
        </div>
    </div>
</section>
