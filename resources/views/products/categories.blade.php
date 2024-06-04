<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 z-50">
        <!-- Sidebar -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <div class="hidden w-15vw fixed  flex-col top-0 left-0 bg-white h-full text-gray-600 transition-all duration-300 border-none sidebar sm:flex mt-16">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li>
                            <div class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600  border-l-4 border-transparent">
                                <span class="ml-6 text-sm tracking-wide truncate">
                                    <x-nav-link href="#" :active="request()->routeIs('#')">
                                        {{ __('Cards') }}
                                    </x-nav-link>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600  border-l-4 border-transparent">
                                    <span class="ml-6 text-sm tracking-wide truncate">
                                        <x-nav-link href="#" :active="request()->routeIs('')">
                                            {{ __('T-shirt') }}
                                        </x-nav-link>
                                    </span>
                            </div>
                        </li>
                        <li>
                            <div class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600  border-l-4 border-transparent">
                                <span class="ml-6 text-sm tracking-wide truncate">
                                    <x-nav-link href="#" :active="request()->routeIs('')">
                                        {{ __('Stickers') }}
                                    </x-nav-link>
                                </span>
                            </div>
                        </li>

                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                </div>
            </div>
        </div>

        <!----*******************************************---->
        <!-- Hamburger -->
        <div class="-me-2 mt-16 fixed items-center sm:hidden z-20">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path  :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex text-blue-500 " stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="w-50vw fixed  flex-col top-0 left-0 bg-white h-full text-gray-600 transition-all duration-300 border-none sidebar sm:flex mt-16">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li>
                            <div class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600  border-l-4 border-transparent">
                                <span class="ml-6 text-sm tracking-wide truncate">
                                    <x-nav-link href="#" :active="request()->routeIs('')">
                                        {{ __('T-Shirt') }}
                                    </x-nav-link>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                </div>
            </div>
        </div>
    </nav>
</div>
