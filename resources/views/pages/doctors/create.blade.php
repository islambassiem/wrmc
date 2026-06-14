@extends('layouts.app')


@section('content')
    <x-common.page-breadcrumb />

    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Add New Doctor</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Fill in the details below to register a new doctor
            profile.</p>
    </div>

    {{-- Form Card --}}
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf

        {{-- ── Section 1: Basic Information ───────────────────────────── --}}
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center gap-3">
                <span
                    class="flex items-center justify-center w-7 h-7 rounded-lg bg-teal-50 dark:bg-teal-900/40 text-teal-600 dark:text-teal-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 uppercase tracking-wider">Basic
                    Information</h2>
            </div>

            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">

                {{-- Name --}}
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Sarah Mitchell"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('name') border-red-400 dark:border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. MD, FACS, PhD"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('title') border-red-400 dark:border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Years of Experience --}}
                <div>
                    <label for="years_of_experience"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Years of Experience
                    </label>
                    <input type="number" id="years_of_experience" name="years_of_experience"
                        value="{{ old('years_of_experience') }}" min="0" placeholder="e.g. 12"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('years_of_experience') border-red-400 dark:border-red-500 @enderror">
                    @error('years_of_experience')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Field of Expertise --}}
                <div class="sm:col-span-2">
                    <label for="field_of_expertise"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Field of Expertise
                    </label>
                    <input type="text" id="field_of_expertise" name="field_of_expertise"
                        value="{{ old('field_of_expertise') }}"
                        placeholder="e.g. Cardiothoracic Surgery, Pediatric Neurology"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('field_of_expertise') border-red-400 dark:border-red-500 @enderror">
                    @error('field_of_expertise')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ── Section 2: Contact Information ─────────────────────────── --}}
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center gap-3">
                <span
                    class="flex items-center justify-center w-7 h-7 rounded-lg bg-teal-50 dark:bg-teal-900/40 text-teal-600 dark:text-teal-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 uppercase tracking-wider">Contact
                    Information</h2>
            </div>

            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="doctor@clinic.com"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('email') border-red-400 dark:border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Mobile Phone --}}
                <div>
                    <label for="mobile_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Mobile Phone
                    </label>
                    <input type="tel" id="mobile_phone" name="mobile_phone" value="{{ old('mobile_phone') }}"
                        placeholder="+1 (555) 000-0000"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('mobile_phone') border-red-400 dark:border-red-500 @enderror">
                    @error('mobile_phone')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Office Phone --}}
                <div>
                    <label for="office_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Office Phone
                    </label>
                    <input type="tel" id="office_phone" name="office_phone" value="{{ old('office_phone') }}"
                        placeholder="+1 (555) 000-0001"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('office_phone') border-red-400 dark:border-red-500 @enderror">
                    @error('office_phone')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ── Section 3: Profile & Media ──────────────────────────────── --}}
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center gap-3">
                <span
                    class="flex items-center justify-center w-7 h-7 rounded-lg bg-teal-50 dark:bg-teal-900/40 text-teal-600 dark:text-teal-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 uppercase tracking-wider">Profile
                    & Media</h2>
            </div>

            <div class="p-6 space-y-5">

                {{-- Profile Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Profile
                        Image</label>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        {{-- Preview --}}
                        <div id="image-preview"
                            class="flex-shrink-0 w-24 h-24 rounded-2xl border-2 border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 flex items-center justify-center overflow-hidden">
                            <svg class="w-8 h-8 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        {{-- Upload Button --}}
                        <div class="flex-1">
                            <label for="image"
                                class="inline-flex items-center gap-2 cursor-pointer rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Upload Photo
                            </label>
                            <input type="file" id="image" name="image" accept="image/*" class="sr-only"
                                onchange="previewImage(event)">
                            <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-500">JPG, PNG, or WEBP — max 2MB.
                                Recommended: 400×400px.</p>
                            @error('image')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Bio --}}
                <div>
                    <label for="bio"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Biography</label>
                    <textarea id="bio" name="bio" rows="5" placeholder="Write a professional biography for this doctor..."
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition resize-none @error('bio') border-red-400 dark:border-red-500 @enderror">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Quote --}}
                <div>
                    <label for="quote" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Personal Quote
                        <span class="ml-1 text-xs font-normal text-gray-400 dark:text-gray-500">(displayed on
                            profile page)</span>
                    </label>
                    <div class="relative">
                        <span
                            class="absolute left-4 top-2.5 text-2xl leading-none text-teal-300 dark:text-teal-700 select-none pointer-events-none">"</span>
                        <input type="text" id="quote" name="quote" value="{{ old('quote') }}"
                            placeholder="A short inspiring quote…"
                            class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 pl-8 pr-4 py-2.5 text-sm shadow-sm italic focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition @error('quote') border-red-400 dark:border-red-500 @enderror">
                    </div>
                    @error('quote')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ── Section 4: Credentials ───────────────────────────────────── --}}
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex items-center gap-3">
                <span
                    class="flex items-center justify-center w-7 h-7 rounded-lg bg-teal-50 dark:bg-teal-900/40 text-teal-600 dark:text-teal-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </span>
                <h2 class="text-sm font-semibold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                    Credentials</h2>
            </div>

            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">

                {{-- Education --}}
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="education"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Education</label>
                    <textarea id="education" name="education" rows="4"
                        placeholder="Harvard Medical School, MD&#10;Johns Hopkins University, BSc Biology"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition resize-none @error('education') border-red-400 dark:border-red-500 @enderror">{{ old('education') }}</textarea>
                    @error('education')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Board Certifications --}}
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="board_certifications"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Board
                        Certifications</label>
                    <textarea id="board_certifications" name="board_certifications" rows="4"
                        placeholder="American Board of Internal Medicine&#10;American Board of Cardiology"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 px-4 py-2.5 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition resize-none @error('board_certifications') border-red-400 dark:border-red-500 @enderror">{{ old('board_certifications') }}</textarea>
                    @error('board_certifications')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ── Form Actions ─────────────────────────────────────────────── --}}
        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 pt-2 pb-6">
            <a href="{{ route('doctors.index') }}"
                class="w-full sm:w-auto text-center rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                Cancel
            </a>
            <button type="submit"
                class="w-full sm:w-auto rounded-xl bg-teal-600 hover:bg-teal-700 dark:bg-teal-500 dark:hover:bg-teal-600 px-8 py-2.5 text-sm font-semibold text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950 transition">
                Save Doctor
            </button>
        </div>

    </form>

@endsection


@push('scripts')
    <script>
        // Live slug generation from name
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        nameInput.addEventListener('input', function () {
            if (!slugInput.dataset.manuallyEdited) {
                slugInput.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-');
            }
        });

        slugInput.addEventListener('input', function () {
            this.dataset.manuallyEdited = this.value ? 'true' : '';
        });

        // Image preview
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endpush
