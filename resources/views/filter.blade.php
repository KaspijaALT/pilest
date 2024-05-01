{{-- Page forom navbar where you can create property listing query based on filter options, it will redirect you to results page.--}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray overflow-hidden shadow rounded-lg">
            <div class="p-6">
                <form action="{{ route('properties.search') }}" method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <input type="text" name="country" placeholder="Country" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        <input type="text" name="type" placeholder="Property Type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        <input type="text" name="parking" placeholder="Nearby Parking" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="number" name="min_area" placeholder="Min Area" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        <input type="number" name="max_area" placeholder="Max Area" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="number" name="min_price" placeholder="Min Price" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        <input type="number" name="max_price" placeholder="Max Price" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
