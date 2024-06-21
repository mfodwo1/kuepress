<div>
    <div x-data="{ editing: @entangle('editing') }">
        <div x-show="!editing">
            <span class="font-bold text-sm" @click="editing = true">{{ \Illuminate\Support\Str::limit($description, 50, '...') }}</span>
        </div>
        <div x-show="editing">
            <textarea class="w-full p-2 border" rows="3" x-ref="textarea" wire:model="description"></textarea>
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" wire:click="updateDescription">Save</button>
            <button class="mt-2 px-4 py-2 bg-gray-500 text-white rounded" @click="editing = false">Cancel</button>
        </div>
    </div>
</div>





{{--<div>--}}
{{--    <div x-data="{ editing: @entangle('editing') }">--}}
{{--        <div x-show="!editing">--}}
{{--            <span class="font-bold text-sm" @click="editing = true">{{ \Illuminate\Support\Str::limit($description, 50, '...') }}</span>--}}
{{--        </div>--}}
{{--        <div x-show="editing">--}}
{{--            <textarea class="w-full p-2 border" rows="2" x-ref="textarea" wire:model="description"></textarea>--}}
{{--            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded" wire:click="updateDescription" @click="editing = false">Save</button>--}}
{{--            <button class="mt-2 px-4 py-2 bg-gray-500 text-white rounded" @click="editing = false">Cancel</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
