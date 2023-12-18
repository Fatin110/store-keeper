<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('update.product') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$specificProduct->id}}">
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" value="{{ $specificProduct->name }}" required>

                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" value="{{ $specificProduct->price }}" required>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="{{ $specificProduct->quantity }}" required>

                    <button type="submit">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
