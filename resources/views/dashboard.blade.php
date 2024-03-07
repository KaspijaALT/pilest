<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <!-- Property Filters -->
                    <div class="mt-6">
                        <div class="flex flex-wrap -mx-2">
                            <div class="p-2">
                                <input type="text" id="filterCountry" placeholder="Country" class="w-full p-2 border rounded">
                            </div>
                            <!-- Other filters omitted for brevity -->
                            <div class="p-2">
                                <input type="number" id="filterAreaFrom" placeholder="Area From" class="w-full p-2 border rounded">
                            </div>
                            <div class="p-2">
                                <input type="number" id="filterAreaTo" placeholder="Area To" class="w-full p-2 border rounded">
                            </div>
                            <div class="p-2">
                                <input type="number" id="filterPriceFrom" placeholder="Price From" class="w-full p-2 border rounded">
                            </div>
                            <div class="p-2">
                                <input type="number" id="filterPriceTo" placeholder="Price To" class="w-full p-2 border rounded">
                            </div>
                            <div class="p-2">
                                <select id="filterNearbyParking" class="w-full p-2 border rounded">
                                    <option value="">Nearby Parking</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <!-- ... -->
                            <div class="p-2">
                                <button onclick="applyFilters()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Properties List -->
                    <div class="mt-6">
                        <div id="propertiesContainer" class="flex flex-wrap -mx-2">
                            <!-- Properties will be inserted here by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function applyFilters() {
            // Get filter values
            const countryFilter = document.getElementById('filterCountry').value.toLowerCase();
            // Other filters omitted for brevity
            const areaFrom = document.getElementById('filterAreaFrom').value;
            const areaTo = document.getElementById('filterAreaTo').value;
            const priceFrom = document.getElementById('filterPriceFrom').value;
            const priceTo = document.getElementById('filterPriceTo').value;
            const nearbyParkingFilter = document.getElementById('filterNearbyParking').value;

            // Filter properties
            const propertyCards = document.querySelectorAll('.property-card');
            propertyCards.forEach(card => {
                const country = card.getAttribute('data-country').toLowerCase();
                // Other data attributes omitted for brevity
                const area = parseInt(card.getAttribute('data-area'), 10);
                const price = parseInt(card.getAttribute('data-price'), 10);
                const nearbyParking = card.getAttribute('data-nearby-parking');

                // Check if property matches filters
                const matchesCountry = countryFilter === '' || country.includes(countryFilter);
                // Other matches omitted for brevity
                const matchesArea = (areaFrom === '' || area >= areaFrom) && (areaTo === '' || area <= areaTo);
                const matchesPrice = (priceFrom === '' || price >= priceFrom) && (priceTo === '' || price <= priceTo);
                const matchesNearbyParking = nearbyParkingFilter === '' || nearbyParking === nearbyParkingFilter;

                // Show or hide card based on matches
                if (matchesCountry && matchesArea && matchesPrice && matchesNearbyParking) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</x-app-layout>
