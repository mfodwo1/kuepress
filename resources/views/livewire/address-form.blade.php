<div>
    <form wire:submit.prevent="submit" class="bg-white p-4 rounded shadow-md">
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

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Submit</button>
    </form>
</div>
