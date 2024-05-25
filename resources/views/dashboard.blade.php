{{-- Main page where the properties are listed, including navbar with all the pages --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <!-- Filter Sidebar -->
            <div class="w-full md:w-1/4 lg:w-1/4 pr-4">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Filter Properties</h2>
                    <form action="{{ route('properties.search') }}" method="GET" class="space-y-4">
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Property Type</label>
                            <input type="text" id="type" name="type" placeholder="Property Type" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="parking" class="block text-sm font-medium text-gray-700">Nearby Parking</label>
                            <input type="text" id="parking" name="parking" placeholder="Nearby Parking" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="min_area" class="block text-sm font-medium text-gray-700">Min Area</label>
                            <input type="number" id="min_area" name="min_area" placeholder="Min Area" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="max_area" class="block text-sm font-medium text-gray-700">Max Area</label>
                            <input type="number" id="max_area" name="max_area" placeholder="Max Area" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                            <input type="number" id="min_price" name="min_price" placeholder="Min Price" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                            <input type="number" id="max_price" name="max_price" placeholder="Max Price" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                        </div>
                        <div>
                            <label for="sort" class="block text-sm font-medium text-gray-700">Sort by Price</label>
                            <select id="sort" name="sort" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                <option value="">Sort by Price</option>
                                <option value="asc">Price: Low to High</option>
                                <option value="desc">Price: High to Low</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Filter
                        </button>
                    </form>
                </div>
            </div>

            <!-- Properties Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($properties as $property)
                    <a href="{{ url('/properties', $property->property_ID) }}" class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                        <div class="shadow p-4 rounded-lg bg-white">
                            <div class="flex justify-center relative rounded-lg overflow-hidden h-52">
                                <img src="{{ $property->picture }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform ease-in-out hover:scale-110">
                                <div class="absolute inset-0 bg-black opacity-10"></div>
                            </div>
                            <div class="mt-4">
                                <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="{{ $property->name }}">
                                    {{ $property->Property_type }}
                                </h2>
                                <p class="mt-2 text-sm text-gray-800 line-clamp-1" title="{{ $property->location }}">
                                    {{ $property->location }} @ {{ $property->country }}
                                </p>
                            </div>
                                
                                <div class="flex justify-end">
                                    <p class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">
                                        <span class="text-sm uppercase"> $ </span>
                                        <span class="text-lg">{{ number_format($property->Price, 0) }}</span>
                                    </p>
                                </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
