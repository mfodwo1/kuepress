<div>
{{--    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">--}}
{{--        @foreach($designs as $design)--}}
{{--            <div class="group" wire:click="redirectToDetails({{ $design->id }})" style="cursor:pointer;">--}}
{{--                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">--}}
{{--                    <img src="{{ asset('storage/'.$design->thumbnail) }}" alt="{{ $design->title }}" class="h-full w-full object-cover object-center group-hover:opacity-75">--}}
{{--                </div>--}}
{{--                <h3 class="p-4 text-sm font-bold">{{ $design->title }}</h3>--}}
{{--                <p class="mt-1 text-lg font-medium text-gray-900">GH₵{{ $design->price }}</p>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach($designs as $design)
            <a href="{{ route('design.details', ['designId'=>$design->id]) }}" class="group">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                    <img src="{{ asset('storage/'.$design->thumbnail) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="p-4 text-sm font-bold">{{$design->title}}</h3>
                <p class="mt-1 text-lg font-medium text-gray-900">GH₵{{ $design->price }}</p>
            </a>
        @endforeach
    </div>
</div>
