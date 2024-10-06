<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($victoryweekend) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ isset($victoryweekend) ? route('victoryweekend.update', $victoryweekend->id) : route('victoryweekend.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($victoryweekend)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="batch_no" value="Batch No" />
                            <x-text-input id="batch_no" name="batch_no" type="text" class="mt-1 block w-full" :value="$victoryweekend->batch_no ?? old('batch_no')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('batch_no')" />
                        </div>
                        <div>
                            <x-input-label for="event_date" value="Event Date" />
                            <x-text-input id="event_date" name="event_date" type="text" class="mt-1 block w-full" :value="$victoryweekend->event_date ?? old('event_date')"   />
                            <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
                        </div>
                        <div>
                            <x-input-label for="location" value="Location" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="$victoryweekend->location ?? old('location')"   />
                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                        </div>
                        <div>
                            <x-input-label for="details" value="Details" />
                            <textarea name="details" id="details" cols="30" rows="3" class="mt-1 block w-full"> </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('details')" />
                        </div>




                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('victoryweekend.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>

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
