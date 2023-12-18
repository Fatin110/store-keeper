<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div style="text-align:center; border: 2px solid green; width: 30%; margin: 0 auto;">
                    @if (session('delete'))
                        <div style="color:red;">
                            {{ session('delete') }}
                        </div>
                    @endif
                    @if (session('updated'))
                        <div style="color:green;">
                            {{ session('updated') }}
                        </div>
                    @endif
                    @if (session('sold'))
                        <div style="color:green;">
                            {{ session('sold') }}
                        </div>
                    @endif
                    </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- DB::table('products')->get(); --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>

                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>

                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Update</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete</th>

                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sell</th>

                                <!-- Add more table headers for other columns -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap"><a
                                            href="{{ route('update_specific_product', ['param' => $product->id]) }}">
                                            <button>Update</button>
                                        </a></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><a
                                            href="{{ route('delete_product', ['param' => $product->id]) }}">
                                            <button>Delete</button>
                                        </a></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><a
                                            href="{{ route('product_sold', ['param' => $product->id]) }}">
                                            <button>Sold Amount</button>
                                        </a></td>
                                    <!-- Add more table cells for other columns -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                    {{-- <form action="{{ route('update.product') }}" method="POST">
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
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
