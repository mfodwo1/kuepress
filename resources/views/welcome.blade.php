<x-guest-layout>

    <div class="relative min-h-screen md:flex mt-12 pt-12" data-dev-hint="container">
        <input type="checkbox" id="menu-open" class="hidden" />

        <label for="menu-open" class="absolute right-2 bottom-2 shadow-lg rounded-full p-2 bg-gray-100 text-gray-600 md:hidden" data-dev-hint="floating action button">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>

        <header class="bg-gray-600 text-gray-100 flex justify-between md:hidden" data-dev-hint="mobile menu bar">
            <a href="#" class="block p-4 text-white font-bold whitespace-nowrap truncate">
                Categories
            </a>

            <label for="menu-open" id="mobile-menu-button" class="m-2 p-2 focus:outline-none hover:text-white hover:bg-gray-700 rounded-md">
                <svg id="menu-open-icon" class="h-6 w-6 transition duration-200 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="menu-close-icon" class="h-6 w-6 transition duration-200 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </header>

        <aside id="sidebar" class="bg-gray-50 text-gray-900 md:w-64 w-3/4 space-y-6 pt-6 px-0 absolute inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-200 ease-in-out  md:flex md:flex-col md:justify-between overflow-y-auto rounded-t-xl" data-dev-hint="sidebar; px-0 for frameless; px-2 for visually inset the navigation">
            <div class="flex flex-col space-y-6" data-dev-hint="optional div for having an extra footer navigation">
                <h3 class="text-blue-500 flex items-center space-x-2 px-4" title="Your App is cool">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span class="text-2xl font-extrabold whitespace-nowrap truncate">Categories</span>
                </h3>
{{--                categories item--}}
                <nav data-dev-hint="main navigation">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 py-2 px-4 transition duration-200 hover:bg-blue-400 hover:text-white">
                        <span class="ml-6">All</span>
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('filter', $category->id) }}" class="flex items-center space-x-2 py-2 px-4 transition duration-200 hover:bg-blue-400 hover:text-white">
                            <span class="ml-6">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>

            <nav data-dev-hint="second-main-navigation or footer navigation">
                <a href="#" class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">
                    ...............
                </a>
                <a href="#" class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">
                    ...................
                </a>
                <a href="#" class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">
                    kuepress
                </a>
            </nav>
        </aside>

        <main id="content" class="flex-1 p-6 lg:px-8">
            <div class="max-w- mx-auto">
                <!-- content -->
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <h2 class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach($designs as $design)
                                <a href="{{ route('details', [$design->id]) }}" class="group">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                        <img src="{{ asset('storage/'.$design->thumbnail) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="p-4 text-sm font-bold">{{$design->title}}</h3>
                                    <p class="mt-1 text-lg font-medium text-gray-900">GH₵{{ $design->price }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /End of content -->
            </div>


        </main>
    </div>

</x-guest-layout>
