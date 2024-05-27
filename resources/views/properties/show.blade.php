{{-- When property card clicked on ir redirects to a different page for detailed property view where you can add it to cart and pay via stripe--}}
<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Property Details -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <div class="mb-6">
                @if($property->pictures->isNotEmpty())
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($property->pictures as $picture)
                            <img src="{{ 'data:image/png;base64,' . base64_encode($picture->image) }}" class="w-full h-64 object-cover" alt="Property Image">
                        @endforeach
                    </div>
                @else
                    <div class="w-full h-64 bg-gray-300 flex justify-center items-center">
                        <span>No Image Available</span>
                    </div>
                @endif
            </div>

            <div class="mb-6">
                <!-- Property Name -->
                <h2 class="text-xl font-bold">{{ $property->name }}</h2>
                <p class="text-sm text-gray-600">Property ID: {{ $property->property_ID }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Property Country -->
                <div>
                    <h3 class="font-semibold">Country</h3>
                    <p>{{ $property->country }}</p>
                </div>

                <!-- Property Type -->
                <div>
                    <h3 class="font-semibold">Property Type</h3>
                    <p>{{ $property->Property_type }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Property Built Year -->
                <div>
                    <h3 class="font-semibold">Built Year</h3>
                    <p>{{ $property->built }}</p>
                </div>

                <!-- Nearby Parking -->
                <div>
                    <h3 class="font-semibold">Nearby Parking</h3>
                    <p>{{ $property->Nearby_parking }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Property Area -->
                <div>
                    <h3 class="font-semibold">Area (sq ft)</h3>
                    <p>{{ number_format($property->area) }} sq ft</p>
                </div>

                <!-- Property Price -->
                <div>
                    <h3 class="font-semibold">Price</h3>
                    <p>${{ number_format($property->Price, 2) }}</p>
                </div>
            </div>
            <form action="{{ route('cart.add', $property->property_ID) }}" method="POST">
                @csrf
                <button type "submit" class="px-4 py-2 bg-neutral-700 text-white rounded hover:bg-lime-600">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>

