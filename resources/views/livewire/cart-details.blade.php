<div>
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
                                        <livewire:edit-description :description="$item->options->description" :rowId="$item->rowId" :options="$item->options" />
                                        {{--                                        <span class="font-bold text-sm">{{ Str::limit($item->options->description, 50, '...') }}</span>--}}
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
                        <!-- Additional summary details -->
                        <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                    </div>
                </div>
            </div>

        </div>
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
