<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-6 shadow-md">
                            <p style="font-size: 20px;">Today's Sale: {{$totalSalesToday}}</p>
                        </div>
                        <div class="bg-white rounded-lg p-6 shadow-md">
                            <p style="font-size: 20px;">Yesterday's Sale: {{$totalSalesYesterday}}</p>
                        </div>
                        <div class="bg-white rounded-lg p-6 shadow-md">
                            <p style="font-size: 20px;">This Month's Sale: {{$totalSalesThisMonth}}</p>
                        </div>
                        <div class="bg-white rounded-lg p-6 shadow-md">
                            <p style="font-size: 20px;">Last Month Sale: {{$totalSalesLastMonth}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
