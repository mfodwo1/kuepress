<div>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h1 class="text-2xl font-bold">Order Placed Successfully!</h1>
            <p class="mt-4">Thank you for your order. Your order ID is <strong>{{ $orderId }}</strong>.</p>
            <p class="mt-2 mb-6">You can use this ID to track your order status.</p>

            <a href="{{ route('dashboard') }}" class="bg-gray-100 py-2 px-4 rounded-2xl hover:text-gray-400">Continue to Shop</a>
        </div>
    </div>
</div>
