<div class="mt-16">
    <div class="bg-gray-100 pt-4">
        <style>
            #summary {
                background-color: #f6f6f6;
            }
        </style>

        <div class="container mx-auto">
            <div class="md:flex shadow-md my-10">
                <div class="bg-white px-10 py-10 flex-1">
                    <div class="flex justify-between border-b pb-8">
                        <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                        <h2 class="font-semibold text-2xl">{{ $count }} Items</h2>
                    </div>
                    @foreach ($items as $item)
                        <div class="md:flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-full">
                                <div class="w-20 h-20">
                                    <img class="w-full h-full object-cover preview-image" src="{{ $item->options->has('image') ? asset('storage/'.$item->options->image) : 'default-image-url' }}"
                                         data-preview-url="{{ $item->options->has('large_image') ? asset('storage/'.$item->options->large_image) : asset('storage/'.$item->options->image) }}"
                                         alt="product image">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{ $item->name }}</span>
                                    <livewire:edit-description :description="$item->options->description" :rowId="$item->rowId" :image="$item->options->image" />
                                    <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs" wire:click.prevent="removeFromCart('{{ $item->rowId }}')">Remove</a>
                                </div>
                            </div>
                            <div class="flex justify-between w-full md:w-3/5 mt-4 md:mt-0">
                                <div class="flex justify-center w-1/5 ml-6">
                                    <input class="mx-2 border text-center w-24 rounded" type="number" value="{{ $item->qty }}" wire:change="updateCart('{{ $item->rowId }}', $event.target.value)">
                                </div>
                                <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($item->price, 2) }}</span>
                                <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($item->subtotal, 2) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Order Summary -->
                <div id="summary" class="bg-gray-100 px-8 py-10 flex-shrink-0 md:w-1/3">
                    <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                    <div class="flex justify-between mt-10 mb-5">
                        <span class="font-semibold text-sm uppercase">{{ $count }} Items</span>
                        <span class="font-semibold text-sm">${{ number_format($total, 2) }}</span>
                    </div>
                    <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full" wire:click="processCheckout">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>





{{--<div>--}}
{{--    <div class="bg-gray-100 pt-4">--}}
{{--        <style>--}}
{{--            #summary {--}}
{{--                background-color: #f6f6f6;--}}
{{--            }--}}
{{--        </style>--}}

{{--        <div class="container mx-auto">--}}
{{--            <div class="md:flex shadow-md my-10">--}}
{{--                <div class="bg-white px-10 py-10 flex-1">--}}
{{--                    <div class="flex justify-between border-b pb-8">--}}
{{--                        <h1 class="font-semibold text-2xl">Shopping Cart</h1>--}}
{{--                        <h2 class="font-semibold text-2xl">{{ count($cartItems) }} Items</h2>--}}
{{--                    </div>--}}
{{--                    @foreach ($cartItems as $item)--}}
{{--                        <div class="md:flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">--}}
{{--                            <div class="flex w-full md:w-2/5">--}}
{{--                                <div class="w-20">--}}
{{--                                    <img class="h-24 preview-image" src="{{ isset($item['options']['image']) ? asset('storage/'.$item['options']['image']) : 'default-image-url' }}"--}}
{{--                                         alt="product image">--}}
{{--                                </div>--}}
{{--                                <div class="flex flex-col justify-between ml-4 flex-grow">--}}
{{--                                    <span class="font-bold text-sm">{{ $item['name'] }}</span>--}}
{{--                                    <span class="text-sm">{{ $item['options']['description'] }}</span>--}}
{{--                                    <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs" wire:click.prevent="removeFromCart('{{ $item['rowId'] }}')">Remove</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex justify-between w-full md:w-3/5 mt-4 md:mt-0">--}}
{{--                                <div class="flex justify-center w-1/5 ml-6">--}}
{{--                                    <input class="mx-2 border text-center w-24 rounded" type="number" value="{{ $item['qty'] }}" wire:change="updateCart('{{ $item['rowId'] }}', $event.target.value)">--}}
{{--                                </div>--}}
{{--                                <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($item['price'], 2) }}</span>--}}
{{--                                <span class="text-center w-1/5 font-semibold text-sm">${{ number_format($item['subtotal'], 2) }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <!-- Order Summary -->--}}
{{--                <div id="summary" class="bg-gray-100 px-8 py-10 flex-shrink-0 md:w-1/3">--}}
{{--                    <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>--}}
{{--                    <div class="flex justify-between mt-10 mb-5">--}}
{{--                        <span class="font-semibold text-sm uppercase">{{ count($cartItems) }} Items</span>--}}
{{--                        <span class="font-semibold text-sm">${{ number_format($total, 2) }}</span>--}}
{{--                    </div>--}}
{{--                    <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full" wire:click="processCheckout">Checkout</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
