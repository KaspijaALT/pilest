{{-- resources/views/properties/show.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $property->name }}</h1>
        <p>{{ $property->description }}</p>
        <!-- Add more property details here -->
        <div>
            <img src="{{ $property->picture }}" alt="Property Image">
        </div>
        <!-- Add additional images and details as needed -->
    </div>
@endsection