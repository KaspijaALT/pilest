{{-- resources/views/properties/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2>{{ $property->name }}</h2>
    </x-slot>

    <div>
        <img src="{{ $property->picture }}" alt="Main Picture">
        {{-- You can loop through more pictures if your model supports it --}}
        <div>
            <h3>{{ $property->Property_type }}</h3>
            <p>{{ $property->location }}, {{ $property->country }}</p>
            <p>Price: ${{ number_format($property->Price, 0) }}</p>
            {{-- More details about the property --}}
        </div>
    </div>
</x-app-layout>
