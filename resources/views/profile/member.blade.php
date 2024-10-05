{{-- use AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <p>
                        <a href="{{ route('profile.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Create New</a>
                    </p>
                    <br>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">
                            <thead class="text-lg text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-black-200">
                                <tr>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4  py-4" width="600px" align="left">
                                        Status
                                    </th>
                                    <th scope="col" class="px-4 py-4" width="200px" align="left">
                                        Created at
                                    </th>
                                    <th scope="col" class="px-4 py-4" width="200px" align="left">
                                        Updated at
                                    </th>

                                    <th scope="col" class="px-4 py-4" width="200px" align="left">
                                       Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $value)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->name }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $value->status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $value->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $value->updated }}
                                    </td>

                                    <td class="py-4" align="left">
                                        Approve |<a href="{{ route('profile.show', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> | Delete
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
</x-app-layout>
