<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

@include('partials.head')

<body class="min-h-screen antialiased pt-36">
    <main class="min-h-screen font-sans" role="main">
        <nav class="animate-slide-down bg-primary-50 fixed top-0 left-0 right-0 w-full z-50" role="navigation">
            <div class="flex flex-col md:flex-row md:justify-between w-full ">
                {{-- <div class="flex items-center justify-between gap-3 flex-1"> --}}
                    <img src="{{ asset('assets/logo.webp') }}" alt="WRMC Logo" class="h-20 lg:h-36 lg:mx-0">
                    <span class="block mx-5 md:hidden">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </span>
                    <div class="hidden md:flex items-center justify-evenly mx-auto gap-5 p-4 flex-1">
                        <a href="/" class="text-lg font-semibold uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Home</a>
                        <a href="#services" class="text-lg font-semibold uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Services</a>
                        <a href="#doctors" class="text-lg font-semibold uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Team</a>
                        <a href="#" class="text-lg font-semibold uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Contact</a>
                    </div>
                {{-- </div> --}}
                <a href="/"
                    class="uppercase md:self-center md:me-2 md:rounded-md inline-flex items-center justify-center flex-wrap gap-2 bg-primary-800 hover:bg-primary-900 text-primary-50 font-semibold py-2 md:py-4 md:px-2 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    Book Now
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
