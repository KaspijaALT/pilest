<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilgrim EST - Find Your Desired Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .box {
            width: 400px;
            height: 150px;
            border: 2px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-jura flex flex-col items-center min-h-screen">

    <!-- Header -->
    <header class="bg-gray-900 py-4 px-6 flex justify-between items-center w-full sticky top-0 z-10">
        <div class="text-2xl font-bold text-green-500">Pilgrim EST</div>
        <nav class="flex items-center">
            <a href="{{ url('/?lang=lv') }}" class="text-white font-medium hover:text-green-500 mr-4">LAT</a>
            <a href="{{ url('/?lang=en') }}" class="text-green-500 font-medium mr-4">ENG</a>
            <a href="{{ url('/about') }}" class="text-white font-medium hover:text-green-500 mr-4">About</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white font-medium hover:text-green-500">Register</a>
            @endif
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-white font-medium hover:text-green-500 ml-4">Login</a>
            @endif
        </nav>
    </header>

    <main class="flex flex-col justify-center items-center w-full px-4 py-6 flex-grow">

        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold">Agents. Tours. Loans. Homes.</h1>
        </div>
        
        <div class="relative w-full max-w-md mb-8">
            <input type="text" placeholder="Enter an address, neighborhood, city, or ZIP code" class="bg-gray-800 text-white px-4 py-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-500">
            <button class="absolute right-0 top-0 bg-green-500 text-black px-4 py-2 rounded-md font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 w-full max-w-screen-xl px-6">
            <div class="text-center bg-gray-800 p-6 rounded-md">
                <i class="fas fa-home text-green-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-medium mb-2">Buy a home</h3>
                <p>Find your place with an immersive photo experience and the most listings, including things you won't find anywhere else.</p>
                <a href="#" class="text-green-500 font-medium hover:underline">Browse homes</a>
            </div>
            <div class="text-center bg-gray-800 p-6 rounded-md">
                <i class="fas fa-chart-line text-green-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-medium mb-2">Sell a home</h3>
                <p>No matter what path you take to sell your home, we can help you navigate a successful sale.</p>
                <a href="#" class="text-green-500 font-medium hover:underline">See your options</a>
            </div>
            <div class="text-center bg-gray-800 p-6 rounded-md">
                <i class="fas fa-file-invoice-dollar text-green-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-medium mb-2">Rent a home</h3>
                <p>We're creating a seamless online experience - from shopping on the largest rental network, to applying, to paying rent.</p>
                <a href="#" class="text-green-500 font-medium hover:underline">Find rentals</a>
            </div>
        </div>

        <div class="box"></div>
        <div>
            <h3 class="text-5xl font-bold">About us</h3>
        </div>
        
    </main>

    <footer class="bg-gray-900 py-4 text-center text-sm w-full">
        <p>Made with love from Latvia ❤️</p>
        <p>All rights reserved. © {{ date('Y') }} Pilgrim Estate</p>
    </footer>

</body>
</html>