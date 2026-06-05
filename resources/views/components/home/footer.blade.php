<footer class=" py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
            {{-- Brand --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('assets/logo.gif') }}" alt="logo">
                    </div>
                    <span class="text-2xl font-extrabold text-violet-900 ">Wembley RD <br>Medical Center</span>
                </div>
                <p class="text-sm leading-relaxed max-w-sm">
                    Providing patients with world-class healthcare and compassionate medical services.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class=" font-semibold mb-4 text-sm uppercase tracking-wider">Our Services</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="/"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">General
                            Practitioner</a></li>
                </ul>
            </div>

            <div>
                <h4 class=" font-semibold mb-4 text-sm uppercase tracking-wider">About</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">Our
                            Team</a></li>
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">Our
                            Services</a></li>
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">Blogs</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class=" font-semibold mb-4 text-sm uppercase tracking-wider">Resources</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">FAQs</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">Contacts</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-violet-800 transition-all duration:500 hover:-translate-y-1 block">Privacy
                            Policy</a></li>
                </ul>
            </div>
        </div>

        {{-- Timings --}}
        <div class="mb-3">
            <p>90 Wembley Rd, Logan Central, QLD 4114</p>
            <p>Open: 7 Days - 8:30AM - 5:00PM (WE 2 pm)</p>
            <a href="tel:0734128333" class="text-blue-600 underline block">Phone: (07) 3412 8333</a>
            <a href="mailto:wrmc4114@gmail.com" class="text-blue-600 underline block">E-mail: wrmc4114@gmail.com</a>
        </div>

        {{-- Bottom Bar --}}
        <div class="flex flex-col sm:flex-row justify-between items-center pt-8 border-t border-gray-800 text-sm">
            <p>&copy; {{ date('Y') }} Wembley . All rights reserved.</p>
            <div class="flex gap-4 mt-4 sm:mt-0">
                <a href="https://www.instagram.com/wrmcau/" class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors"
                    aria-label="instagram">
                    <i class="fa-brands fa-square-instagram fa-xl duration-300 hover:text-violet-500"></i>
                </a>
                <a href="https://www.facebook.com/wrmcau/" class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors"
                    aria-label="facebook">
                    <i class="fa-brands fa-facebook fa-xl duration-300 hover:text-violet-500"></i>
                </a>
                <a href="https://x.com/wrmcau0" class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors"
                    aria-label="x">
                    <i class="fa-brands fa-x-twitter fa-xl duration-300 hover:text-violet-500"></i>
                </a>
                <a href="https://www.linkedin.com/company/wrmcau/" class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors"
                    aria-label="linkedin">
                    <i class="fa-brands fa-linkedin fa-xl duration-300 hover:text-violet-500"></i>
                </a>
                <a href="https://www.tiktok.com/@wrmcau" class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors"
                    aria-label="tiktok">
                    <i class="fa-brands fa-tiktok fa-xl duration-300 hover:text-violet-500"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
