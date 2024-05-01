{{-- Results show when filter query is filled, property filtering result page--}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($properties as $property)
                <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                    <a href="/properties/{{ $property->id }}" class="w-full block h-full">
                        <img alt="property image" src="{{ $property->picture }}" class="max-h-40 w-full object-cover" />
                        <div class="bg-white dark:bg-gray-800 w-full p-4">
                            <p class="text-indigo-500 text-md font-medium">
                                Featured
                            </p>
                            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                                {{ $property->Property_type }}
                            </p>
                            <p class="text-gray-400 dark:text-gray-300 font-light text-md">
                                {{ $property->location }} - {{ $property->country }}
                            </p>
                            <div class="flex items-center mt-4">
                                <div class="rounded-full w-6 h-6 md:w-8 md:h-8 bg-gray-200"></div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-bold text-gray-500 dark:text-gray-100 text-xs">
                                        Agent
                                    </h6>
                                    <p class="text-gray-800 dark:text-white">
                                        {{ $property->agent }}
                                    </p>
                                </div>
                                <div class="flex-end">
                                    <p class="text-xl text-gray-600 dark:text-gray-400 font-bold">
                                        ${{ number_format($property->Price, 0) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>