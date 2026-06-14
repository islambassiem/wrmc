@extends('layouts.app')

@section('content')

    <x-common.page-breadcrumb pageTitle="Create Post" />

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <x-ui.alert variant="error">{{ $error }}</x-ui.alert>
            @endforeach
        </div>
    @endif
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
        <form method="POST" action="{{ route('posts.store') }}"
            class="flex flex-col border-b border-gray-200 p-5 dark:border-gray-800 space-y-8">
            @csrf

            <div class="flex-1">
                <label for="categories" class="mb-2.5 text-sm font-medium text-heading">Select category</label>
                <select id="categories" name="category_id"
                    class="block w-lg px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                    <option value="" selected>Select All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id === request()->integer('category_id'))>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="message" class="block my-2.5 text-sm font-medium text-heading">Post Title</label>
            <x-forms.input type="text" name="title" placeholder="Post Title" />

            <label for="message" class="block my-2.5 text-sm font-medium text-heading">Post Body</label>
            <textarea id="message" rows="4" name="body"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body"
                placeholder="Write your thoughts here...">
                            </textarea>

            <x-ui.button type="submit" class="mt-4 self-end">Submit</x-ui.button>

        </form>
    </div>

@endsection
