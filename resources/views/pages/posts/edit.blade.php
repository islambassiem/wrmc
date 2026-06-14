@extends('layouts.app')



@section('content')
    <x-common.page-breadcrumb pageTitle="Edit Post" />
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">

        <form method="POST" action="{{ route('posts.update', $post->id) }}"
            class="flex flex-col border-b border-gray-200 p-5 dark:border-gray-800 space-y-8">
            @csrf
            @method('PUT')
            <div class="sm:flex sm:justify-between sm:items-center sm:gap-6 sm:flex-1 mb-2">
                <div class="w-full">
                    <label for="categories" class="mb-2.5 text-sm font-medium text-heading">Select
                        category</label>
                    <select id="categories" name="category_id"
                        class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                        <option disabled selected>Select All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id === $post->category_id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="statuses" class="mb-2.5 text-sm font-medium text-heading">Select Status
                        {{ request()->string('status') }}</label>
                    <select id="statuses" name="status"
                        class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                        <option disabled selected>Select All</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->value }}" @selected($status->value == $post->status->value)>
                                {{ ucfirst($status->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <label for="message" class="block my-2.5 text-sm font-medium text-heading">Post Title</label> --}}
            <x-forms.input type="text" label="Post Title" name="title" placeholder="Post Title" value="{{ $post->title }}" class="mb-1"/>

            <label for="message" class="block my-2.5 text-sm font-medium text-heading">Post Body</label>
            <textarea id="message" rows="4" name="body"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body"
                placeholder="Write your thoughts here...">{{ $post->body }}</textarea>

            <x-ui.button type="submit" class="mt-4 self-end">Submit</x-ui.button>

        </form>
    </div>
@endsection
