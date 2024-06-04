<!-- header -->

<nav
    class="sticky top-0 z-50 text-white w-full transition-all ease-in duration-300"
    :class="scrolledFromTop ? 'bg-kuepres-secondary/45 md:bg-black bg-opacity-80' :
        'bg-white md:bg-black'"
    x-data="{ openNav: false }"
>
    <div
        class="relative flex flex-row default-site-margins md:w-[80%] mx-auto justify-between items-center h-14"
    >
        <div class="flex md:hidden justify-between items-center w-full">
            <div class="flex" wire:click="homepage">
                <a href="/" class="flex items-center">
                    <div class="h16 w-16">
                        <img
                            src="{{ asset('images/logo/KuePres-Logo.png') }}"
                            class="w-full h-full object-cover"
                            alt="kuepres logo"
                        />
                    </div>
                </a>
            </div>

            <ion-icon
                class="text-black"
                name="menu"
                size="large"
                onclick="Menu(this)"
            ></ion-icon>
        </div>
        <div
            id="navMenu"
            class="md:relative fixed inset-0 hidden md:block bg-black backdrop-blur-sm md:backdrop-blur-none bg-opacity-10 md:bg-opacity-0 h-full w-full transition-all ease-in-out duration-300"
        >
            <div
                class="items-center justify-center absolute flex flex-col left-0 right-0 top-0 bottom-0 md:flex md:flex-row md:items-center md:justify-between md:space-x-5 space-y-3 md:space-y-0 md:h-full md:w-full"
            >
                <ion-icon
                    name="close"
                    size="large"
                    class="absolute top-0 right-0 m-5 md:hidden"
                    onclick="Close(this)"
                ></ion-icon>
                <ul
                    class="flex flex-col text-sm p-4 md:p-0 mt-4 rounded-lg space-y-5 md:space-y-0 md:flex-row md:space-x-8 md:mt-0 md:h-full justify-center items-center"
                >
                    <li
                        class="{{ '/' == request()->path() ? 'active-menu' : '' }}"
                    >
                        <a
                            href="/"
                            class="hover:border-b-2 hover:border-b-primary duration-300 cursor-pointer"
                            aria-current="page"
                            >Home</a
                        >
                    </li>
                    <li
                        class="{{ 'services' == request()->path() ? 'active-menu' : '' }}"
                    >
                        <a
                            href="/#services"
                            class="hover:border-b-2 hover:border-b-primary duration-300 cursor-pointer"
                            >Prints</a
                        >
                    </li>
                    <li
                        class="{{ 'blogs' == request()->path() ? 'active-menu' : '' }}"
                    >
                        <a
                            href=""
                            class="hover:border-b-2 hover:border-b-primary duration-300 cursor-pointer"
                            >Blog</a
                        >
                    </li>
                    <li
                        class="{{ 'portfolio' == request()->path() ? 'active-menu' : '' }}"
                    >
                        <a
                            href="/portfolio"
                            class="hover:border-b-2 hover:border-b-primary duration-300 cursor-pointer"
                            >Contact</a
                        >
                    </li>
                    <li
                        class="{{ 'portfolio' == request()->path() ? 'active-menu' : '' }}"
                    >
                        <a
                            href="/portfolio"
                            class="hover:border-b-2 hover:border-b-primary duration-300 cursor-pointer"
                            >More</a
                        >
                    </li>
                </ul>
                <div class="flex">
                    <a
                        href="#footer"
                        class="text-white text-sm md:bg-kuepres-secondary bg-kuepres-secondary rounded-sm px-4 py-2 text-center"
                    >
                        Contact Us!
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function Menu(e) {
            let menuItem = document.getElementById("navMenu");
            // e.name === "menu" ? (e.name = "close") : (e.name = "menu");
            menuItem.classList.remove("hidden");
        }

        function Close(e) {
            let menuItem = document.getElementById("navMenu");
            // e.name === "menu" ? (e.name = "close") : (e.name = "menu");
            menuItem.classList.add("hidden");
        }
    </script>
</nav>
<!-- header ends here -->
