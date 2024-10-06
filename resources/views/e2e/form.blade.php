<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($e2e) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ isset($e2e) ? route('e2e.update', $e2e->id) : route('e2e.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($e2e)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="batch_no" value="Batch No" />
                            <x-text-input id="batch_no" name="batch_no" type="text" class="mt-1 block w-full" :value="$e2e->batch_no ?? old('batch_no')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('batch_no')" />
                        </div>
                        <div>
                            <x-input-label for="event_date" value="Event Date" />
                            <x-text-input id="event_date" name="event_date" type="text" class="mt-1 block w-full" :value="$e2e->event_date ?? old('event_date')"   />
                            <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
                        </div>
                        <div>
                            <x-input-label for="facilitator" value="Facilitator" />
                            <x-text-input id="facilitator" name="facilitator" type="text" class="mt-1 block w-full" :value="$e2e->facilitator ?? old('location')"   />
                            <x-input-error class="mt-2" :messages="$errors->get('facilitator')" />
                        </div>




                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('e2e.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>

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
