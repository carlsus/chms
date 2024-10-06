<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($chapter) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ isset($chapter) ? route('chapter.update', $chapter->id) : route('chapter.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($chapter)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="chapter_name" value="Chapter Name" />
                            <x-text-input id="chapter_name" name="chapter_name" type="text" class="mt-1 block w-full" :value="$chapter->chapter_name ?? old('chapter_name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('chapter_name')" />
                        </div>
                        <div>
                            <x-input-label for="description" value="Description" />
                            <textarea name="description" id="description" cols="30" rows="3" class="mt-1 block w-full"> </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>




                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('chapter.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
