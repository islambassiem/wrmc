<section class="fixed top-0 left-0 h-screen w-72 bg-white shadow-2xl z-50 flex flex-col">
    <div class="border-b border-gray-200 p-6">
        <h2 class="text-xl font-bold text-primary-800">
            <img src="{{ asset('assets/logo.webp') }}" alt="logo">
        </h2>
    </div>

    <nav class="flex flex-col py-4">
        <a href="/" class="px-6 py-4 text-lg font-medium hover:bg-primary-50 active:bg-primary-100 transition" @click="open = false">
            <i class="fa-solid fa-house text-primary-800 "></i>
            Home
        </a>

        <a href="#services" class="px-6 py-4 text-lg font-medium hover:bg-primary-50 active:bg-primary-100 transition" @click="open = false">
            <i class="fa-solid fa-kit-medical text-primary-800 "></i>
            Services
        </a>

        <a href="#doctors" class="px-6 py-4 text-lg font-medium hover:bg-primary-50 active:bg-primary-100 transition" @click="open = false">
            <i class="fa-solid fa-user-doctor text-primary-800 "></i>
            Team
        </a>

        <a href="#blog" class="px-6 py-4 text-lg font-medium hover:bg-primary-50 active:bg-primary-100 transition" @click="open = false">
            <i class="fa-solid fa-blog text-primary-800 "></i>
            Blog
        </a>

        <a href="#contacts" class="px-6 py-4 text-lg font-medium hover:bg-primary-50 active:bg-primary-100 transition" @click="open = false">
            <i class="fa-solid fa-phone text-primary-800 "></i>
            Contact
        </a>
    </nav>

    <div class="mt-auto p-6">
        <a href="{{ config('app.booking_url') }}" target="_blank"
            class="block w-full rounded-lg bg-primary-800 py-3 text-center font-semibold text-white hover:bg-primary-900 transition">
            Book Now
        </a>
    </div>
</section>
