<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body class="min-h-screen antialiased">
    <main class="min-h-screen font-sans" role="main">
        <nav class="animate-slide-down bg-primary-50 fixed top-0 left-0 right-0 w-full z-50" role="navigation">
            <div class="flex flex-col md:flex-row md:justify-between w-full">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo.webp') }}" alt="WRMC Logo"
                        class="h-20 lg:h-36 w-auto mx-auto lg:mx-0">
                </div>
                <a href="/"
                    class="uppercase md:self-center md:me-2 md:rounded-md inline-flex items-center justify-center gap-2 bg-primary-800 hover:bg-primary-900 text-primary-50 font-semibold md:px-4 md:py-4 py-2 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    Book Appointment
                </a>
            </div>
        </nav>
        <x-home.hero />
        <x-home.stats />
        <x-home.medicare />
        {{-- <x-home.consultations /> --}}
        <x-home.features />
        <x-home.why-us />
        <x-home.services />
        <x-home.ndis />
        <x-home.doctors />
        <x-home.telehealth />
        <x-home.blog />
        <x-home.accepted-cards />
        <x-home.cta />
        <x-home.footer />
    </main>
</body>

</html>
