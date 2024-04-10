<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Start of main container -->
    <div class="py-12">
        <!-- Start of max-width and centering container -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flex container for filters and property grid -->
            <div class="flex">
                <!-- Existing Filter Sidebar code -->

                <!-- Properties Grid -->
                <div class="properties-grid flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Dynamically populated properties will go here -->
                        @foreach ($properties as $property)
                            <a href="/properties/{{ $property->id }}" class="property-card block rounded-lg p-4 shadow-sm shadow-indigo-100 bg-neutral-600">
                                <img alt="Property Image" src="{{ $property->picture }}" class="h-56 w-full rounded-md object-cover" />

                                <div class="mt-2">
                                    <dl>
                                        <div>
                                            <dt class="sr-only">Price</dt>
                                            <dd class="price-text text-sm text-white">$ {{ number_format($property->Price, 2) }}</dd>
                                        </div>

                                        <div>
                                            <dt class="sr-only">Address</dt>
                                            <dd class="font-medium">{{ $property->address }}</dd>
                                        </div>
                                    </dl>

                                    <div class="mt-6 flex items-center gap-8 text-xs text-white">
                                        <!-- Existing icons and property details -->
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div> <!-- End of Properties Grid -->
            </div> <!-- End of Flex container -->
        </div> <!-- End of max-width and centering container -->
    </div> <!-- End of main container -->
</x-app-layout>
