<x-app-layout>
<a href="{{ route('properties.show', ['property' => $property->property_ID]) }}" class="...">
    <div>
        <h3>{{ $property->name }}</h3>
        <p>it works</p>
    </div>
</a>
</x-app-layout>


