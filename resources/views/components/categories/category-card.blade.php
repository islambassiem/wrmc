@props(['category'])

<div class="flex">
    <div class="mb-6 flex-1 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex flex-col">
                <span> {{ $category->name }}</span>
                <span class="text-xs text-gray-600 dark:text-gray-400"> {{ $category->type }}</span>
            </div>
            <button @click="$dispatch('open-category-edit-modal', {
                    category: @js($category),
                    action: @js(route('categories.update', $category->id)),
                    method: 'PUT',
                })"
                class="shadow-theme-xs flex w-full items-center justify-center gap-2 rounded-full bg-white p-1 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
        </div>
    </div>
</div>
