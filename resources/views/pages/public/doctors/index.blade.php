<x-layouts.page>
    <section class="container mx-auto pt-36 my-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 space-y-4 ">
            {{-- Left Card --}}
            <section class="flex justify-center lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-lg p-6 pt-22 relative max-w-sm self-start">
                    <img src="{{ Storage::url($doctor->image) }}" alt="{{ Str::slug($doctor->name) }}"
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md absolute -top-7.5 lg:-top-2 left-1/2 -translate-x-1/2">

                    <p class="text-xl font-bold text-gray-900">
                        {{ $doctor->name }}
                    </p>

                    <p class="text-gray-500 text-sm my-1 text-center">
                        {{ $doctor->title }}
                    </p>

                    <div class="border-t pt-2 space-y-3 text-sm">
                        @if ($doctor->mobile_phone)
                            <div class="flex gap-2 text-gray-600">
                                <i class="fa-solid fa-mobile text-primary-800"></i>
                                <span>{{ $doctor?->mobile_phone }}</span>
                            </div>
                        @endif
                        @if ($doctor->office_phone)
                            <div class="flex gap-2 text-gray-600">
                                <i class="fa-solid fa-phone text-primary-800"></i>
                                <span>{{ $doctor?->office_phone }}</span>
                            </div>
                        @endif
                        @if ($doctor->email)
                            <div class="flex gap-2 text-gray-600">
                                <i class="fa-solid fa-envelope text-primary-800"></i>
                                <span>{{ $doctor?->email }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            {{-- Right Card --}}
            <section class=" mx-4 lg:col-span-9 pt-10 pb-4 px-6 rounded-2xl">
                {{-- Upper Bio --}}
                @if ($doctor->bio)
                    <div>
                        <h1 class="text-4xl sm:text-3xl md:text-5xl font-bold font-serif">{{ $doctor->name }}
                        </h1>
                        <h2 class="text-md text-primary-950 my-4">{{ $doctor->title }}</h2>
                        <div class="border-b border-gray-700 mb-4"></div>
                        <div>{!! $doctor->bio !!}</div>
                    </div>
                @endif
                {{-- Lower Certifications --}}
                <section class="mt-10 space-y-10">
                    <h3 class="text-3xl font-bold font-serif">Education & Experience</h3>
                    {{-- Education --}}
                    @if ($doctor->education)
                        <section class="flex border-b border-gray-700 pb-4">
                            <p class="font-bold min-w-50 text-lg">Education</p>
                            <p class="ml-4 text-lg">
                                {{ $doctor->education }}
                            </p>
                        </section>
                    @endif
                    @if ($doctor->board_certifications)
                        <section class="flex border-b border-gray-700 pb-4">
                            <p class="font-bold min-w-50 text-lg">Board Certifications</p>
                            <p class="ml-4 text-lg">
                                {{ $doctor->board_certifications }}
                            </p>
                        </section>
                    @endif
                    @if ($doctor->field_of_expertise)
                        <section class="flex border-b border-gray-700 pb-4">
                            <p class="font-bold min-w-50 text-lg">Field Of Expertise</p>
                            <p class="ml-4 text-lg">
                                {{ $doctor->field_of_expertise }}
                            </p>
                        </section>
                    @endif
                    @if ($doctor->years_of_experience)
                        <section class="flex border-b border-gray-700 pb-4">
                            <p class="font-bold min-w-50 text-lg">Years of Experience</p>
                            <p class="ml-4 text-lg">
                                {{ $doctor->years_of_experience }}
                            </p>
                        </section>
                    @endif
                </section>
                {{-- Doctor Quote --}}
                @if ($doctor->quote)
                    <section class="my-10">
                        <h3 class="text-3xl font-bold font-serif">Doctor's Quote</h3>
                        <blockquote
                            class="p-4 my-4 border-s-4 border-blue-500 bg-gray-50 dark:bg-gray-800 dark:border-gray-500">
                            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                {{ $doctor->quote }}
                            </p>
                            <cite class="block mt-2 text-sm font-semibold text-gray-500 not-italic dark:text-gray-400">
                                — {{ $doctor->name }}
                            </cite>
                        </blockquote>
                    </section>
                @endif
            </section>
        </div>
    </section>
</x-layouts.page>
