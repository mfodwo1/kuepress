<x-guest-layout>
    <div>
        <div class="relative min-h-screen md:flex mt-16" data-dev-hint="container">
            <div class="sm:min-h-80 mt-16 md:pl-6 md:pt-6 md:w-2/5 relative">
                <img src="{{ asset('storage/'. $design->thumbnail) }}" class="w-full rounded top-0 left-0" alt="thumbnail" srcset="">
            </div>
            <main class="flex-1 p-3 md:p-6 lg:px-8">
                <div class="max-w- mx-auto min-h-screen flex items-center">

                    <div class="flex mx-auto">
                        <div>
                            <h2 class="text-4xl bold">{{ $design->title }}</h2>
                            <p> Price: GH₵{{ $design->price }}</p>
                            <p>Category: {{ $design->categories[0]['name'] ?? 0 }}</p>
                            <p>{{ $design->description }}</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-guest-layout>
