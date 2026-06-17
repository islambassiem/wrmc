@extends('layouts.app')


@section('content')
    <x-common.page-breadcrumb pageTitle="Doctors" />

    <div class="flex justify-end mb-5">
        <a class="py-2 px-4 bg-brand-800 text-brand-50 rounded-xl hover:bg-brand-800" href="{{ route('doctors.create') }}">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <div class="rounded-2xl p-5 border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3 lg:p-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($doctors as $doctor)
                <a href="{{ route('doctors.edit', $doctor) }}"
                    class="relative flex flex-col h-full  bg-gray-50 dark:bg-slate-800 rounded-3xl shadow-lg p-5 w-full max-w-xs mx-auto overflow-hidden">

                    <!-- Badge -->
                    @if ($doctor->resignation_date)
                        <span
                            class="absolute top-4 -right-8.75 rotate-45 bg-red-500 text-white text-xs font-bold px-10 py-1 shadow-md">
                            Resigned
                        </span>
                    @endif

                    <div class="aspect-square overflow-hidden rounded-2xl ">
                        <img src="{{ Storage::url($doctor->image ?? 'doctors/default.gif') }}" alt="{{ $doctor->name }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105 rounded-full">
                    </div>

                    <p class="mt-4 text-lg font-semibold text-center text-gray-800 dark:text-gray-100">
                        {{ $doctor->name }}
                    </p>

                    <p class="text-center text-gray-600 dark:text-gray-500">
                        {{ $doctor->title }}
                    </p>
                </a>
            @endforeach

        </div>
@endsection
