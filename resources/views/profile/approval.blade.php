<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Approval
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ route('profile.update', $users->id)  }}" class="mt-6 space-y-6" enctype="multipart/form-data">

                        @csrf

                        @method('put')



                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$users->name ?? old('name')"  required autofocus autocomplete="name" />
                            <x-text-input id="id" class="block mt-1 w-full" type="hidden" name="id" :value="$users->id ?? old('id')"  />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$users->email ?? old('email')"  required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="leader_id" :value="__('Leader')" />
                            <x-input-select :options="$leader" id="leader_id" name="leader_id" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('leader_id')" class="mt-2" />
                        </div>




                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                {{ __('Approve') }}
                            </x-primary-button>
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
