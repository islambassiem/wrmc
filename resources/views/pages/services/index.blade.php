@extends('layouts.app', [
    'title' => 'Services'
])


@section('content')
    <x-common.page-breadcrumb pageTitle="Services" />

        <div class="space-y-6">
        @session('success')
            <x-ui.alert variant="success">
                {{ $value }}
            </x-ui.alert>
        @endsession

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
            <div class="flex justify-end border-b border-gray-200 p-5 dark:border-gray-800">
                <x-services.add-service
                    :services="$services"
                />
            </div>
            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="w-full min-w-275.5>
                                                    <thead>
                                                        <tr class=" border-b border-gray-100 dark:border-gray-800">
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">#</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Name</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Parent</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Updated At</p>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            /** @var \Illuminate\Pagination\LengthAwarePaginator $services */
                        @endphp
                        @forelse ($services as $service)
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6 wrap-break-word">
                                    <img src="{{ $service->image }}" alt="{{ $service->slug }}">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $service->name }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $service->parent?->name }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $service->updated_at }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('services.edit', $service) }}"
                                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-theme-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('services.destroy', $service) }}"
                                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-theme-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-8 text-center">
                                    <p class="text-gray-500 dark:text-gray-400">No services found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($services->hasPages())
            <div class="mt-4">
                {{ $services->links() }}
            </div>
        @endif
    </div>
@endsection
