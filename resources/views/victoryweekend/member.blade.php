{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Victory Weeekend') }}

        </h2>

    </x-slot>
    {{-- @if ($user->isAdmin)
        <p>Welcome, Admin!</p>
@endif --}}
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
                                        Batch No
                                    </th>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Date
                                    </th>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Location
                                    </th>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Details
                                    </th>

                                    <th scope="col" class="px-4 py-4" width="100px" align="left">
                                       Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($victoryweekend as $value)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->batch_no }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->event_date }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->location }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->details }}
                                    </td>

                                    <td class="py-4" align="left">
                                        <a href="{{ route('victoryweekend.edit', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Join</a>
                                        {{-- <form method="post" action="{{ route('membergroup.destroy', $value->id) }}" class="inline">
                                            @csrf
                                            @method('delete')

                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                                        </form> --}}
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
