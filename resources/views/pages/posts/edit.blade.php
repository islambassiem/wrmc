@extends('layouts.app', [
    'title' => 'Edit Post'
])



@section('content')
    <x-common.page-breadcrumb pageTitle="Edit Post" />
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3 px-8">

        <form method="POST" action="{{ route('posts.update', $post->slug) }}" id="update-post-form"
            class="flex flex-col py-5 dark:border-gray-800 space-y-8">
            @csrf
            @method('PUT')
            <input type="hidden" name="session_token" value="{{ $sessionToken }}">
            <div class="sm:flex sm:justify-between sm:items-center sm:gap-6 sm:flex-1 mb-2">
                <div class="w-full">
                    <label for="statuses" class="mb-2.5 text-sm font-medium text-heading">Select Status
                        {{ request()->string('status') }}</label>
                    <select id="statuses" name="status"
                        class="block w-sm px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                        <option disabled selected>Select All</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->value }}" @selected($status->value == $post->status->value)>
                                {{ ucfirst($status->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button form="deleteForm" type="submit" class="w-36 bg-red-700 text-white dark:bg-red-800 dark:text-gray-100 p-2 rounded-xl">
                    <i class="fa-solid fa-trash"></i>Delete Post
                </button>
            </div>
            <x-forms.input type="text" label="Post Title" name="title" placeholder="Post Title"
                value="{{ $post->title }}" class="mb-5" />

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Post
                    Body</label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="body" id="content">
                @error('body')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-ui.button type="submit" class="mt-4 self-end mb-5">Submit</x-ui.button>
        </form>
        <form action="{{ route('posts.destroy', $post) }}" method="post" id="deleteForm" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'size': ['small', false, 'large', 'huge']
                }], // custom dropdown
                [{
                    'header': [2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote'],
                ['link'],
                ['image'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'list': 'check'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'align': []
                }],

                ['clean'] // remove formatting button
            ];
            const editor = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: {
                        container: toolbarOptions,
                        handlers: {
                            image: function() {
                                selectLocalImage()
                            }
                        }
                    }
                },
                placeholder: 'The content of the post...',
            });

            editor.root.innerHTML = @json(old('body', $post->body));

            const form = document.getElementById('update-post-form');
            const hiddenInput = document.querySelector('#content');

            form.addEventListener('submit', function() {
                hiddenInput.value = editor.root.innerHTML;
            });

            function selectLocalImage() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = () => {
                    const file = input.files[0];
                    if (file) {
                        uploadImage(file);
                    }
                }
            }

            function uploadImage(file) {
                const formData = new FormData;
                const sessionToken = document.querySelector('input[name="session_token"]').value;
                formData.append('image', file);
                formData.append('session_token', sessionToken);
                fetch("{{ route('uploadImage') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(result => {
                        const range = editor.getSelection();
                        editor.insertEmbed(range.index, 'image', result.url);
                    })
                    .catch(err => console.error(err));
            }
        });
    </script>
@endpush
