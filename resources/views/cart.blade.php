{{-- resources/views/cart.blade.php --}}
{{-- When you click on cart, it redirects you to this page where session is responsible for the properties youd like to buy--}}

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>
            
            @if(session('cart') && count(session('cart')) > 0)
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Property_type</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(session('cart') as $id => $details)
                        <tr>
                            <td class="border px-4 py-2">{{ $details['Property_type'] }}</td> <!-- Corrected line -->
                            <td class="border px-4 py-2">{{ $details['quantity'] }}</td>
                            <td class="border px-4 py-2">${{ $details['price'] }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form action="{{ route('checkout.handle') }}" method="POST">
                    @csrf  <!-- CSRF token for protection -->
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
                        Proceed to Checkout
                    </button>
                </form>

            @else
                <p>Your cart is empty!</p>
            @endif
        </div>
    </div>
</x-app-layout>
