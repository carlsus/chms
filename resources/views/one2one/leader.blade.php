<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('One 2 One') }}

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <br>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">
                            <thead class="text-lg text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-black-200">
                                <tr>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Leader
                                    </th>
                                    <th scope="col" class="px-4 py-4" width="100px" align="left">
                                       Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($one2one as $value)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->user->name }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->leader_id }}
                                    </td>


                                    <td class="py-4" align="left">
                                        {{-- <a href="{{ route('victoryweekend.edit', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Assign</a> --}}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            let confirmation = confirm("Are you sure you want to delete this item?");

            if (confirmation) {
                alert("Item has been deleted.");
                // Code to delete the item goes here
            } else {
                alert("Item was not deleted.");
            }
        }
    </script>
</x-app-layout>
