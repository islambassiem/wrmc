@extends('layouts.app', [
    'title' => 'Create Post'
])

@section('content')

    <x-common.page-breadcrumb pageTitle="Create Post" />

    @if ($errors->any())
        <div class="space-y-4">
            @foreach ($errors->all() as $error)
                <x-ui.alert variant="error">{{ $error }}</x-ui.alert>
            @endforeach
        </div>
    @endif
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3 mt-4">
        <form method="POST" action="{{ route('posts.store') }}" id="create-post-form"
            class="flex flex-col border-b border-gray-200 p-5 dark:border-gray-800 space-y-8">
            @csrf
            <input type="hidden" name="session_token" value="{{ $sessionToken }}">
            <label for="message" class="block my-2.5 text-sm font-medium text-heading">Post Title</label>
            <input type="text" name="title" placeholder="Post Title" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-gray-300" />

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Post
                    Body</label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="body" id="content">
                @error('body')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-ui.button type="submit" class="mt-4 self-end" id="submit-button">Submit</x-ui.button>
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

            const form = document.getElementById('create-post-form');
            const hiddenInput = document.querySelector('#content');
            const title = document.querySelector('input[name="title"]').value.trim();

            const oldBody = @json(old('body'));
            if (oldBody) {
                editor.root.innerHTML = oldBody;
            }

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
                    } else {
                        console.log('no file');
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
