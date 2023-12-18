<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

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
                                    Product ID</th>

                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sales</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sold At</th>



                                <!-- Add more table headers for other columns -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($allTransactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->product_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->productSales }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->updated_at }}</td>

                                    <!-- Add more table cells for other columns -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
