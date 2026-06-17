<div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6">
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3 md:p-6">
        <div class="flex items-center justify-center size-10 bg-gray-100 rounded-xl dark:bg-gray-800">
            <i class="fa-solid fa-user-doctor"></i>
        </div>

        <div class="flex items-end justify-between mt-5">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Doctors</span>
                <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">{{ $doctors }}</h4>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3 md:p-6">
        <div class="flex items-center justify-center size-10 bg-gray-100 rounded-xl dark:bg-gray-800">
            <i class="fa-solid fa-bullhorn"></i>
        </div>

        <div class="flex items-end justify-between mt-5">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Published Posts</span>
                <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">{{ $publishedPosts }}</h4>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/3 md:p-6">
        <div class="flex items-center justify-center size-10 bg-gray-100 rounded-xl dark:bg-gray-800">
            <i class="fa-solid fa-lock"></i>
        </div>

        <div class="flex items-end justify-between mt-5">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Draft Posts</span>
                <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">{{ $draftPosts }}</h4>
            </div>
        </div>
    </div>
</div>
