<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilgrim EST - Find Your Dream Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        }
        .property-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-inter">
    <!-- Header -->
    <header class="bg-white py-4 px-8 fixed w-full top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-home text-green-600 text-2xl"></i>
                <span class="text-2xl font-bold text-green-600">Pilgrim EST</span>
            </div>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-green-600">Home</a>
                <a href="#properties" class="text-gray-700 hover:text-green-600">Properties</a>
                <a href="#services" class="text-gray-700 hover:text-green-600">Services</a>
                <a href="#about" class="text-gray-700 hover:text-green-600">About</a>
                <a href="#contact" class="text-gray-700 hover:text-green-600">Contact</a>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/?lang=lv') }}" class="text-gray-700 hover:text-green-600">LAT</a>
                    <a href="{{ url('/?lang=en') }}" class="text-green-600 font-medium">ENG</a>
                </div>
                @auth
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dashboard') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-green-600">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Register</a>
                    </div>
                @endauth
            </nav>
            <button class="md:hidden text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-bg pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">Find Your Dream Home</h1>
                <p class="text-xl md:text-2xl mb-12">Discover luxury properties across Latvia</p>
                
                <!-- Enhanced Search Filter -->
                <div class="bg-white p-6 rounded-xl shadow-xl max-w-4xl mx-auto">
                    <form method="GET" action="#" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <input type="text" name="location" placeholder="Location..." class="col-span-1 md:col-span-2 lg:col-span-1 bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                        <select name="property_type" class="bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="">Property Type</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="villa">Villa</option>
                            <option value="land">Land</option>
                        </select>
                        <select name="price_range" class="bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="">Price Range</option>
                            <option value="0-50000">Up to €50,000</option>
                            <option value="50000-100000">€50,000 - €100,000</option>
                            <option value="100000-200000">€100,000 - €200,000</option>
                            <option value="200000+">€200,000+</option>
                        </select>
                        <select name="bedrooms" class="bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="">Bedrooms</option>
                            <option value="1">1+ Bedroom</option>
                            <option value="2">2+ Bedrooms</option>
                            <option value="3">3+ Bedrooms</option>
                            <option value="4">4+ Bedrooms</option>
                        </select>
                        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition-all focus:ring-2 focus:ring-green-500">
                            <i class="fas fa-search mr-2"></i> Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section id="properties" class="py-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Properties</h2>
                <p class="text-xl text-gray-600">Handpicked properties for your consideration</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 6; $i++)
                <div class="property-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://via.placeholder.com/600x400" class="w-full h-64 object-cover" alt="Property">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full">
                            Featured
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Luxury {{ $i % 2 == 0 ? 'House' : 'Apartment' }}</h3>
                        <p class="text-gray-600 mb-4">{{ ['Riga', 'Jurmala', 'Liepaja'][$i % 3] }}, Latvia</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-green-600">€{{ number_format(rand(100000, 500000)) }}</span>
                            <div class="flex space-x-4 text-gray-600">
                                <span><i class="fas fa-bed mr-2"></i>{{ rand(1, 5) }}</span>
                                <span><i class="fas fa-bath mr-2"></i>{{ rand(1, 3) }}</span>
                                <span><i class="fas fa-ruler-combined mr-2"></i>{{ rand(50, 200) }}m²</span>
                            </div>
                        </div>
                        <a href="#" class="block text-center bg-gray-100 text-gray-900 py-2 rounded-lg hover:bg-green-600 hover:text-white transition-all">
                            View Details
                        </a>
                    </div>
                </div>
                @endfor
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-all">
                    View All Properties
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600">Comprehensive real estate solutions for you</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach(['Property Sales', 'Property Management', 'Legal Consultation', 'Investment Advisory'] as $service)
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-{{ ['home', 'cogs', 'balance-scale', 'chart-line'][$loop->index] }} text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $service }}</h3>
                    <p class="text-gray-600">Professional assistance in every step of your real estate journey.</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Pilgrim EST?</h2>
                <p class="text-xl text-gray-600">Your trusted partner in real estate</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-medal text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">15+ Years Experience</h3>
                    <p class="text-gray-600">Extensive knowledge of the Latvian real estate market.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-handshake text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Trusted by 10,000+ Clients</h3>
                    <p class="text-gray-600">Building lasting relationships through exceptional service.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">100% Satisfaction</h3>
                    <p class="text-gray-600">Committed to exceeding your expectations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
                <p class="text-xl text-gray-600">Real stories from satisfied clients</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(['John Smith', 'Maria Garcia', 'Peter Johnson'] as $name)
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <img src="https://via.placeholder.com/60" class="w-12 h-12 rounded-full mr-4" alt="Client">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $name }}</h4>
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Exceptional service from start to finish. The team at Pilgrim EST made finding our dream home a breeze."</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                    <p class="text-xl text-gray-600 mb-8">Have a question? We're here to help!</p>
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Office Location</h4>
                                <p class="text-gray-600">Brīvības iela 100, Riga, LV-1001, Latvia</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Phone Number</h4>
                                <p class="text-gray-600">+371 20 123 456</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Email Address</h4>
                                <p class="text-gray-600">info@pilgrimest.lv</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 mb-2" for="name">Full Name</label>
                                <input type="text" id="name" name="name" class="w-full bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="message">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full bg-gray-100 text-gray-900 px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition-all focus:ring-2 focus:ring-green-500">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-green-600">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-white opacity-90 mb-8">Subscribe to our newsletter for the latest property updates</p>
            <form class="max-w-2xl mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-3 rounded-lg focus:ring-2 focus:ring-green-500">
                <button type="submit" class="bg-white text-green-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-all focus:ring-2 focus:ring-green-500">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <i class="fas fa-home text-green-600 text-2xl"></i>
                        <span class="text-2xl font-bold text-white">Pilgrim EST</span>
                    </div>
                    <p class="text-gray-400">Your trusted partner in finding the perfect property in Latvia.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#properties" class="text-gray-400 hover:text-white">Properties</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Property Types</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white">Houses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Apartments</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Villas</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Land</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Commercial</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">© {{ date('Y') }} Pilgrim EST. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="mobile-menu">
        <div class="bg-white h-full w-64 p-8">
            <div class="flex justify-between items-center mb-8">
                <div class="text-2xl font-bold text-green-600">Pilgrim EST</div>
                <button class="text-gray-700" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <nav class="space-y-6">
                <a href="#" class="block text-gray-700 hover:text-green-600">Home</a>
                <a href="#properties" class="block text-gray-700 hover:text-green-600">Properties</a>
                <a href="#services" class="block text-gray-700 hover:text-green-600">Services</a>
                <a href="#about" class="block text-gray-700 hover:text-green-600">About</a>
                <a href="#contact" class="block text-gray-700 hover:text-green-600">Contact</a>
                <div class="pt-6 border-t border-gray-200">
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-green-600 mb-4">Login</a>
                    <a href="{{ route('register') }}" class="block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-center">Register</a>
                </div>
            </nav>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.querySelector('.md\\:hidden').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.remove('hidden');
        });
    </script>
</body>
</html>