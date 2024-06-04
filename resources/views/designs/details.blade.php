<x-guest-layout>
    <div class="relative min-h-screen md:flex mt-16" data-dev-hint="container">
        <div class="relative sm:mt-16 md:pl-6 md:w-2/5 md:ml-6">
            <img src="{{ asset('storage/'. $design->thumbnail) }}" class="w-full rounded absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt="thumbnail" srcset="">
        </div>
        <main class="flex-1 p-3 md:p-6 lg:px-8">
            <div class="max-w- mx-auto min-h-screen bg-blue-500 flex items-center">
            </div>
        </main>
    </div>
</x-guest-layout>
