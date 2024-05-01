{{-- Favorite page in navbar linked, shows liked properties. --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h1 class="text-xl font-semibold mb-4">My Favorite Properties</h1>
                @if($properties->isEmpty())
                    <p>You have no favorite properties yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($properties as $property)
                            <div class="bg-gray-100 p-4 rounded">
                                <h2 class="text-lg font-bold">{{ $property->Property_type }}</h2>
                                <p>{{ $property->country }}</p>
                                <p>Area: {{ $property->area }} sqm</p>
                                <p>Price: ${{ number_format($property->Price, 2) }}</p>
                                <a href="{{ route('properties.show', $property->id) }}" class="text-indigo-600 hover:text-indigo-900">View details</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>