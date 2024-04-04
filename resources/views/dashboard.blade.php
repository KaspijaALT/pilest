<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Content starts here -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-lg">Properties</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($properties as $property)
                        <div class="rounded overflow-hidden shadow-lg">
                            <img class="w-full" src="{{ $property->picture }}" alt="Property Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $property->Property_type }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $property->country }} - Built in {{ $property->built }}
                                </p>
                                <p class="text-gray-700 text-base">
                                    {{ $property->area }} sqft - ${{ number_format($property->Price, 2) }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>