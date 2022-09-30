<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food') }} >> Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                    @if ($errors->any())
                        <div
                            class="flex items-center justify-between p-4 border rounded text-amber-700 bg-red-50 border-red-900/10"
                            role="alert"
                        >
                            <div>
                                <strong class="text-sm font-medium"> There's something wrong! </strong>
                                <ul class="mt-1 ml-2 text-xs list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button class="opacity-90" type="button">
                                <span class="sr-only"> Close </span>

                                <svg
                                    class="w-4 h-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>

                        </div>
                    @endif
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:col-span-2 md:m t-0">
                        <form action="{{route('food.update', $food->id)}}" method="POST" enctype="multipart/form-data">
                            {!! method_field('put') !!}
                            @csrf
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $food->name }}">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="picture_path" class="block text-sm font-medium text-gray-700">Picture</label>
                                            <input name="picture_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="picture_path" type="file" placeholder="User Image">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea type="text" name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $food->description }}</textarea>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                                            <input type="text" name="ingredients" id="ingredients" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $food->ingredients }}">
                                            <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, Controh: nasi, daging, bawang</p>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input type="number" name="price" id="price" autocomplete="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $food->price }}">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="rate" class="block text-sm font-medium text-gray-700">Rate</label>
                                            <input type="number" name="rate" id="rate" autocomplete="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $food->rate }}" step="0.01" max="5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="types" class="block text-sm font-medium text-gray-700">Types</label>
                                            <input type="text" name="types" id="types" autocomplete="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $food->types }}">
                                            <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, Controh: recommended, popular, newFood</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
