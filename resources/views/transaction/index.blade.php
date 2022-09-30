<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <td class="border px-6 py-4">No.</td>
                        <td class="border px-6 py-4">Food</td>
                        <td class="border px-6 py-4">User</td>
                        <td class="border px-6 py-4">Quantity</td>
                        <td class="border px-6 py-4">Total</td>
                        <td class="border px-6 py-4">Status</td>
                        <td class="border px-6 py-4">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $row)
                        <tr>
                            <td class="border px-6 py-4">{{$row->id}}</td>
                            <td class="border px-6 py-4">{{$row->food->name}}</td>
                            <td class="border px-6 py-4">{{$row->user->name}}</td>
                            <td class="border px-6 py-4">{{$row->quantity}}</td>
                            <td class="border px-6 py-4">{{number_format($row->total)}}</td>
                            <td class="border px-6 py-4">{{$row->status}}</td>
                            <td class="border px-6 py-4 text-center">
                                <a href="{{ route('transactions.show', $row->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">View</a>
                                <form action="{{route('transactions.destroy', $row->id)}}" method="post" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-red-400 hover:bg-red-600 py-2 px-4 rounded text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border text-center p-5">
                                Empty data
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{$items->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
