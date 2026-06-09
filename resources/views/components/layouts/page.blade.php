<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

@include('partials.head')

<body class="antialiased">
    <main class="font-sans" role="main" x-data="{open: false}">
        <nav class="animate-slide-down bg-primary-50 fixed top-0 left-0 right-0 w-full z-50" role="navigation">
            <div class="flex flex-col md:flex-row md:justify-between w-full ">
                <div class="flex items-center justify-between gap-3 flex-1">
                    <img src="{{ asset('assets/logo.webp') }}" alt="WRMC Logo"
                        class="h-20 w-auto object-contain lg:h-36 lg:mx-0">
                    <button @click="open = true" class="block mx-5 md:hidden" aria-label="Menu">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>
                    <div x-show="open" x-transition.opacity class="fixed inset-0 z-40">
                        <!-- Backdrop -->
                        <div @click="open = false" class="absolute inset-0 bg-black/50"></div>

                        <!-- Drawer -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                            class="relative z-50">
                            <x-home.modal />
                        </div>
                    </div>
                    <div class="hidden md:flex items-center mx-auto gap-4 lg:gap-5 p-4 flex-1">
                        <a href="/"
                            class="text-lg uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Home</a>
                        <a href="#services"
                            class="text-lg uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Services</a>
                        <a href="#doctors"
                            class="text-lg uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Team</a>
                        <a href="#blog"
                            class="text-lg uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Blog</a>
                        <a href="#contacts"
                            class="text-lg uppercase py-2 px-4 rounded-md transition duration-500 hover:bg-primary-800 hover:text-primary-50">Contact</a>
                    </div>
                </div>
                <a href="{{ config('app.booking_url') }}" target="_blank"
                    class="uppercase shrink-0 md:self-center md:me-2 md:rounded-md inline-flex items-center justify-center flex-wrap gap-2 bg-primary-800 hover:bg-primary-900 text-primary-50 font-semibold py-2 md:py-4 md:px-6 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                    Book Now
                </a>
            </div>
        </nav>
        <section>
            {{ $slot }}
        </section>
    </main>
</body>

</html>
