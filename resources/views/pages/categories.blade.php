@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Categories" />
    @session('success')
        <x-ui.alert variant="success">
            {{ $value }}
        </x-ui.alert>
    @endsession
    @if ($errors->any())
        <x-ui.alert variant="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-ui.alert>
    @endif
    <div
        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3 lg:p-6 mt-5 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="flex items-center justify-between mb-5 col-span-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Categories</h3>
            <button class="py-2 px-4 bg-brand-800 text-brand-50 rounded-2xl hover:bg-brand-800"
                @click="$dispatch('open-category-create-modal', { action: '{{ route('categories.store') }}', method: 'POST' })">
                Add
            </button>
        </div>

        @foreach ($categories as $category)
            <x-categories.category-card :category="$category" />
        @endforeach
    </div>

    <x-categories.modal x-data="{
        open: false,
        category: {
            name: '',
            type: '',
        },
        action: null,
        method: 'POST',
    }"
        @open-category-edit-modal.window="
        open = true;
        category = $event.detail.category;
        action = $event.detail.action;
        method = $event.detail.method;
    "
        @open-category-create-modal.window="
        open = true;
        category = {name: '', type: ''};
        action = $event.detail.action;
        method = $event.detail.method;
    "
        x-show="open" x-cloak @keydown.escape.window="open = false" class="max-w-175">
        <div
            class="no-scrollbar relative w-full max-w-175 overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
            <div class="px-2 pr-14">
                <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Edit Category
                </h4>
                <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
                    Update the category
                </p>
            </div>
            <form x-bind:action="action" method="POST" class="flex flex-col" id="form">
                @csrf
                <input type="hidden" name="_method" :value="method">
                <div class="p-2">
                    <div>
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Name
                            </label>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                            <input type="text" id="name" value="{{ old('name') }}"
                                @open-category-edit-modal.window="$el.value = $event.detail.category.name"
                                autocomplete="{{ 'name' }}" name="name"
                                class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />

                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <div>
                        <div>
                            <div class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Type
                            </div>
                            @error('type')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="flex justify-between gap-2">
                                @foreach ($types as $type)
                                    <label class="block cursor-pointer flex-1">
                                        <input id="{{ 'type' . $loop->iteration }}" type="radio" name="type"
                                            value="{{ $type->value }}" class="peer sr-only"
                                            @open-category-edit-modal.window="$event.detail.category.type === '{{ $type->value }}' ? $el.checked = true : ''"
                                            {{ old('type') === $type->value ? 'checked' : '' }} />
                                        <div
                                            class="flex items-center justify-between rounded-xl border border-gray-300 px-4 py-3 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-700 hover:border-gray-400">
                                            <span class="font-medium">{{ ucfirst($type->value) }}</span>
                                            <span
                                                class="hidden rounded-full bg-blue-600 px-2 py-1 text-xs font-semibold text-white peer-checked:inline-block">
                                                Selected
                                            </span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end">
                    <button @click="open = false" type="button"
                        class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 sm:w-auto">
                        Close
                    </button>
                    <button type="submit"
                        class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </x-categories.modal>


    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
