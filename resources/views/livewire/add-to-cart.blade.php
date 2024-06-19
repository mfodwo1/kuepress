<div>
    <div class="mt-16">
        @if (session()->has('message'))
            <div class="bg-teal-500 text-white px-4 py-2">
                {{ session('message') }}
            </div>
        @endif
        @error('userImage')
        <span class="error">{{ $message }}</span>
        @enderror

        <div class="relative min-h-screen md:flex" data-dev-hint="container">
            <div class="sm:min-h-80 mt-16 md:pl-8 md:pt-6 md:w-1/2 relative">
                <img src="{{ asset('storage/' . $design->thumbnail) }}" class="w-full rounded top-0 left-0" alt="thumbnail">
            </div>
            <main class="flex-1 p-3 md:p-6 lg:px-8">
                <div class="max-w- mx-auto min-h-screen flex items-center">
                    <div class="flex mx-auto">
                        <div>
                            <div class="pb-2">
                                <h2 class="text-4xl bold py-3">{{ $design->title }}</h2>
                                <p class="py-2"><span class="font-extrabold">Price:</span> GH₵{{ $design->price }}</p>
                                <p class="py-2"><span class="font-extrabold">Category:</span> {{ $design->categories[0]['name'] }}</p>
                            </div>
                            <hr>
                            <div class="pb-4">
                                <form wire:submit.prevent="addToCart">
                                    <div class="py-2">
                                        <label for="userDesign" class="block">Provide a detailed instruction about the print</label>
                                        <textarea type="text" wire:model="userDescription" class="w-full">{{ $userDescription }}</textarea>
                                    </div>

                                    <div class="py-4">
                                        <div class="flex items-center justify-center bg-gray-50 p-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <label class="block">
                                                <span class="sr-only">Choose your Design</span>
                                                <input type="file" wire:model="userImage" class="block w-full text-sm text-gray-500
                                                    file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-violet-50 file:text-violet-700
                                                    hover:file:bg-violet-100
                                                    cursor-pointer" />
                                                <span wire:loading wire:target="userImage">
                                                    <div class="w-8 h-8 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
                                                </span>
                                                @if ($userImage)
                                                    <img src="{{ $userImage->temporaryUrl() }}" class="w-24">
                                                @endif
                                            </label>
                                        </div>
                                    </div>

                                    <div class="py-4">
                                        <p class="text-sm pb-3">Minimum quantity for this product is {{ $design->min_order }}</p>
                                        <label for="quantity">Quantity</label>
                                        <input type="number" wire:model="quantity" class="w-24 border text-center" min="{{ $design->min_order }}" />
                                        @error('quantity')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            wire:loading.attr="disabled"
                                            wire:target="userImage"
                                            wire:loading.class="opacity-50">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                            <hr>
                            <div>
                                <p class="py-2">{{ $design->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
