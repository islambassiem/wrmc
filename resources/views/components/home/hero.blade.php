<section
    class="relative min-h-screen flex items-center overflow-hidden bg-linear-to-br from-violet-50 via-white to-teal-50">
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        {{-- Gradient Orbs --}}
        <div
            class="absolute -top-40 -right-40 w-96 h-96 bg-linear-to-br from-violet-400 to-teal-400 rounded-full opacity-20 blur-3xl animate-float">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-80 h-80 bg-linear-to-br from-teal-400 to-violet-400 rounded-full opacity-20 blur-3xl animate-float-delayed">
        </div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-linear-to-br from-violet-300 to-purple-300 rounded-full opacity-10 blur-3xl animate-float-slow">
        </div>

        {{-- Medical Grid Pattern --}}
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 ">
        {{-- Navigation --}}
        <nav class="py-6 mb-12 animate-slide-down">
            <div class="flex items-center justify-between ">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo-Photoroom.png') }}" alt="WRMC Logo"
                        class="h-20 w-auto mb-5 mx-auto lg:mx-0">
                </div>
            </div>
        </nav>

        {{-- Hero Content --}}
        <div class="max-w-3xl mx-auto lg:mx-0 lg:max-w-2xl animate-fade-in-up">
            {{-- Badge --}}
            <div
                class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-violet-200 px-4 py-2 rounded-full mb-8 shadow-sm">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
                <span class="text-sm font-medium text-violet-900">
                    Trusted by Logan families for over 45 years
                </span>
            </div>

            {{-- Main Heading --}}
            <h1 class="font-serif text-5xl sm:text-6xl lg:text-7xl font-normal leading-tight mb-6 text-gray-900">
                Logan Central's
                <span class="italic text-violet-600">Family Medical</span>
                Centre
            </h1>

            {{-- Description --}}
            <p class="text-xl text-gray-600 leading-relaxed mb-10">
                Experienced GPs delivering comprehensive healthcare for your whole family — open 7 days
                including weekends. Trusted by Logan families for over 45 years
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 mb-12">
                <a href="/"
                    class="group inline-flex items-center justify-center gap-2 bg-violet-600 hover:bg-violet-700 text-white font-semibold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    Book Appointment
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            {{-- Trust Badges --}}
            <div class="flex flex-wrap gap-6 text-sm text-gray-600">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Open 7 days</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium"> Bulk billing eligible</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Telehealth available</span>
                </div>
            </div>
        </div>
    </div>
</section>
