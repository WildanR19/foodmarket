<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('users.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">+ Create User</a>
            </div>

            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <td class="border px-6 py-4">No.</td>
                            <td class="border px-6 py-4">Name</td>
                            <td class="border px-6 py-4">Email</td>
                            <td class="border px-6 py-4">Roles</td>
                            <td class="border px-6 py-4">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user as $row)
                            <tr>
                                <td class="border px-6 py-4">{{$row->id}}</td>
                                <td class="border px-6 py-4">{{$row->name}}</td>
                                <td class="border px-6 py-4">{{$row->email}}</td>
                                <td class="border px-6 py-4">{{$row->roles}}</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('users.edit', $row->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</a>
                                    <form action="{{route('users.destroy', $row->id)}}" method="post" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-400 hover:bg-red-600 py-2 px-4 rounded text-white">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border text-center p-5">
                                    Empty data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{$user->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
