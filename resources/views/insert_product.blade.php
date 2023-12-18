<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('save.product') }}" method="POST">
                        @csrf
                        @if (session('success'))
                            <div style="text-color:green;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full border-gray-300 rounded-md
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                            <input type="text" id="price" name="price"
                                class="w-full border-gray-300 rounded-md
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <input type="text" id="quantity" name="quantity"
                                class="w-full border-gray-300 rounded-md
                                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-2 rounded-md
                                focus:outline-none text-indigo-800 focus:ring-2 focus:ring-indigo-500
                                focus:ring-offset-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
