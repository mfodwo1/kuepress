<div>
    <div x-data="{ step: 1, useSavedAddress: false }">
        <!-- Step 1: Order Details -->
        <div x-show="step === 1">
            <div class="mt-16">
                <div class="bg-blue-50 pt-4">
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
                                                <img class="w-full h-full object-cover preview-image" src="{{ $item->options->has('image') ? asset('storage/'.$item->options->image) : 'default-image-url' }}" data-preview-url="{{ $item->options->has('large_image') ? asset('storage/'.$item->options->large_image) : asset('storage/'.$item->options->image) }}" alt="product image">
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
                            <div class="bg-gray-100 px-8 py-10 flex-shrink-0 md:w-1/3">
                                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                                <div class="flex justify-between mt-10 mb-5">
                                    <span class="font-semibold text-sm uppercase">{{ $count }} Items</span>
                                    <span class="font-semibold text-sm">${{$total_price }}</span>
                                </div>
                                <button @click="step = 2" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Next: Address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Address Input or Selection -->
        <div x-show="step === 2" class="bg-white p-4 rounded shadow-md">
            <div class="mt-16">
                <div class="bg-blue-50 pt-12 min-h-screen">
                    <div class="bg-white max-w-3xl p-6 flex-1 mx-auto shadow-lg">
                        <div class="mb-4">
                            <label for="useSavedAddress" class="block text-sm font-semibold mb-1">Choose Address Option</label>
                            <select x-model="useSavedAddress" class="w-full border border-gray-300 rounded px-2 py-1">
                                <option value="false">Enter New Address</option>
                                <option value="true">Select Existing Address</option>
                            </select>
                        </div>

                        <!-- New Address Form -->
                        <form x-show="useSavedAddress === 'false'" wire:submit.prevent="saveAddress">
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-semibold mb-1">Address</label>
                                <input type="text" id="address" wire:model="address" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="addition_information" class="block text-sm font-semibold mb-1">Addition Information</label>
                                <input type="text" id="addition_information" wire:model="addition_information" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('addition_information') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-sm font-semibold mb-1">City</label>
                                <input type="text" id="city" wire:model="city" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="region" class="block text-sm font-semibold mb-1">Region</label>
                                <input type="text" id="region" wire:model="region" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('region') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="gps_address" class="block text-sm font-semibold mb-1">GPS Address</label>
                                <input type="text" id="gps_address" wire:model="gps_address" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('gps_address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="country" class="block text-sm font-semibold mb-1">Country</label>
                                <input type="text" id="country" wire:model="country" class="w-full border border-gray-300 rounded px-2 py-1">
                                @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </form>

                        <!-- Saved Address Selection -->
                        <div x-show="useSavedAddress === 'true'" class="mb-4">
                            <label for="saved_addresses" class="block text-sm font-semibold mb-1">Saved Addresses</label>
                            <select id="saved_addresses" wire:model="selectedAddressId" class="w-full border border-gray-300 rounded px-2 py-1">
                                <option value="">Select an existing address</option>
                                @foreach($savedAddresses as $savedAddress)
                                    <option value="{{ $savedAddress->id }}">{{ $savedAddress->address }}, {{ $savedAddress->city }}, {{ $savedAddress->country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-between mt-4">
                            <button @click.prevent="step = 1" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Back</button>
                            <button @click.prevent="step = 3" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">Next: Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Checkout -->
        <div x-show="step === 3" class="bg-white p-4 rounded shadow-md">
            <div class="mt-16">
                <div class="bg-blue-50 pt-12 min-h-screen">
                    <div class="bg-white max-w-3xl p-6 flex-1 mx-auto shadow-lg">
                        <h2 class="text-2xl font-semibold mb-4">Checkout</h2>
                        <p>Order Summary:</p>
                        <p>Items: {{ $count }}</p>
                        <p>Total Price: ${{ $total_price }}</p>
                        <div class="flex justify-between mt-4">
                            <button @click.prevent="step = 2" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Back</button>
                            <button wire:click="processCheckout" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Confirm Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    Add custom toast notfication using alpine js--}}
    <div x-data="{ toasts: [], show(message, type) { this.toasts.push({ message, type }); setTimeout(() => this.toasts.shift(), 3000); } }"
         x-init="
             @if(session('success'))
             show('{{ session('success') }}', 'success');
             @endif

             @if(session('error'))
             show('{{ session('error') }}', 'error');
             @endif

             @if($errors->any())
             @foreach($errors->all() as $error)
             show('{{ $error }}', 'error');
             @endforeach
             @endif
         "
         id="toast-container" class="fixed top-0 right-0 p-4 z-50">
        <template x-for="(toast, index) in toasts" :key="index">
            <div :class="`toast toast-${toast.type} p-4 mb-4 rounded shadow-lg`">
                <template x-if="toast.type === 'success'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="toast-icon w-6 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </template>
                <template x-if="toast.type === 'error'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="toast-icon w-6 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75M12 15h.007M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </template>
                <span x-text="toast.message"></span>
            </div>
        </template>
    </div>


    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const previewImages = document.querySelectorAll('.preview-image');

            previewImages.forEach(image => {
                image.addEventListener('click', function() {
                    const previewUrl = this.getAttribute('data-preview-url');

                    // Create a modal or dialog
                    const modal = document.createElement('div');
                    modal.classList.add('fixed', 'inset-0', 'z-50', 'overflow-auto', 'bg-gray-900', 'bg-opacity-50', 'flex', 'items-center', 'justify-center');
                    modal.innerHTML = `
                    <div class="relative bg-white p-6 rounded-lg shadow-lg">
                        <img src="${previewUrl}" alt="Preview Image">
                        <button class="absolute top-0 right-0 p-2 bg-gray-200  hover:bg-gray-300 text-4xl text-red-500 " id="closeModalButton">X</button>
                    </div>
                `;
                    document.body.appendChild(modal);

                    // Function to close the modal
                    const closeModal = () => {
                        document.body.removeChild(modal);
                    };

                    // Close modal on outside click
                    modal.addEventListener('click', function(event) {
                        if (event.target === modal) {
                            closeModal();
                        }
                    });

                    // Close modal on button click
                    document.getElementById('closeModalButton').addEventListener('click', closeModal);
                });
            });
        });
    </script>
</div>



