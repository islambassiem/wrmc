@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Posts" />

    <div class="space-y-6">
        @session('success')
            <x-ui.alert variant="success">
                {{ $value }}
            </x-ui.alert>
        @endsession

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
            <div class="flex items-center justify-between border-b border-gray-200 p-5 dark:border-gray-800">
                <form class="flex-1" action="{{ route('posts.index') }}" method="GET">
                    @csrf
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between sm:gap-4  space-y-4">
                        <div class="sm:flex sm:justify-between sm:items-center sm:gap-6 sm:flex-1">
                            <div class="w-full">
                                <label for="categories" class="mb-2.5 text-sm font-medium text-heading">Select
                                    category</label>
                                <select id="categories" name="category_id"
                                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                                    <option value="" selected>Select All</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @selected($category->id === request()->integer('category_id'))>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="statuses" class="mb-2.5 text-sm font-medium text-heading">Select Status
                                    {{ request()->string('status') }}</label>
                                <select id="statuses" name="status"
                                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                                    <option value="" selected>Select All</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->value }}"
                                            @selected($status->value == request()->string('status'))>
                                            {{ ucfirst($status->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="self-end sm:self-auto">
                            <button type="submit"
                                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300"><i
                                    class="fa-solid fa-filter"></i>
                            </button>
                            <a href="{{ route('posts.create') }}"
                                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="w-full min-w-275.5>
                                                    <thead>
                                                        <tr class=" border-b border-gray-100 dark:border-gray-800">
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">#</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Title</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Category</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Status</p>
                    </th>
                    <th class="px-5 py-3 text-left sm:px-6">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-200">Updated At</p>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            /** @var \Illuminate\Pagination\LengthAwarePaginator $posts */
                        @endphp
                        @forelse ($posts as $post)
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6 wrap-break-word">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $post->title }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $post->category->name }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $post->status->value }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-200">{{ $post->updated_at }}</p>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-theme-xs transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-8 text-center">
                                    <p class="text-gray-500 dark:text-gray-400">No Posts found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($posts->hasPages())
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection
