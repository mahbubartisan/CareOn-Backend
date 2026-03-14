<!-- Top Contact Bar -->
@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
<div>
    <div x-data="{ open: false }" x-cloak>
        <!-- Header -->
        <header class="fixed left-0 top-0 z-50 w-full bg-white shadow-sm">
            <div class="mx-auto flex items-center justify-between px-4 py-3">
                <!-- Left: Logo -->
                <div class="h-14 w-auto flex-shrink-0 sm:h-14">
                    <a href="{{ route("frontend.home-page") }}">
                        <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ $settings->site_name }}"
                            class="block h-full max-h-14 w-auto object-contain" />
                    </a>
                </div>

                <!-- Middle: Nav links (Desktop) -->
                <nav class="hidden items-center space-x-8 font-normal text-gray-700 lg:flex">
                    <a href="{{ route("frontend.home-page") }}" class="hover:text-[#00B686]">Home</a>
                    <a href="{{ route("frontend.service") }}" class="hover:text-[#00B686]">Services</a>
                    <!-- <a href="#" class="hover:text-[#00B686]">How CareOn Works</a> -->
                    <a href="{{ route("frontend.blogs") }}" class="hover:text-[#00B686]">Health Tips</a>
                    <a href="{{ route("frontend.contact-us") }}" class="hover:text-[#00B686]">Contact</a>
                    <a href="{{ route("frontend.about") }}" class="hover:text-[#00B686]">About Us</a>
                    {{-- <a href="{{ route('frontend.price-calculation') }}" class="hover:text-[#00B686]">Price Calculator</a> --}}
                </nav>

                <!-- Right: Buttons (Desktop) -->
                {{-- <div class="items-center space-x-3 flex">
                    <div class="hidden items-center space-x-3 lg:flex">
                    <!-- Search -->
                    <div class="flex items-center border border-gray-300 rounded-md px-2 py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="ml-1 text-sm text-gray-600">Search</span>
                    </div>

                    <!-- Register -->
                    <a href="{{ route("frontend.provider-signup") }}"
                        class="rounded-xl bg-teal-700 px-4 py-2 text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-teal-800">
                        Register As Care Provider
                    </a>

                    <!-- Sign In -->
                    @guest
                        <a href="{{ route("login") }}"
                            class="rounded-md bg-[#00B686] px-4 py-2 text-sm font-medium text-white hover:bg-[#00976F]">
                            Sign In
                        </a>
                    @endguest

                    <!-- Mobile: Hamburger -->
                    <button @click="open = true" class="text-gray-700 focus:outline-none lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Book Now -->
                    <!-- <a href="book.html"
                        class="rounded-md bg-[#00B686] px-4 py-2 text-sm font-medium text-white hover:bg-[#00976F]">
                        Book Now
                    </a> -->
                </div> --}}
                <div class="flex items-center space-x-2" x-data="{ userMenu: false }">

                    <!-- Always visible -->
                    <a href="{{ route("frontend.provider-signup") }}"
                        class="rounded-xl bg-cyan-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-cyan-800">
                        Be Care Provider
                    </a>

                    <!-- Guest -->
                    @guest
                        <a href="{{ route("login") }}"
                            class="hidden rounded-xl bg-[#00B686] px-4 py-2 text-sm font-medium text-white hover:bg-[#00976F] sm:inline-flex">
                            Sign In
                        </a>
                    @endguest

                    <!-- Logged-in User -->
                    @auth
                        <div class="relative">
                            <!-- Trigger -->
                            <button @click="userMenu = !userMenu"
                                class="flex items-center gap-1 rounded-2xl bg-gray-100 p-1 transition">

                                <!-- Avatar (always visible) -->
                                <img src="{{ asset(auth()->user()->media->path ?? "images/user_profile.webp") }}"
                                    class="h-8 w-8 rounded-full border object-cover" alt="{{ auth()->user()->name }}">

                                <!-- Name (desktop only) -->
                                <span class="hidden text-sm font-medium text-gray-700 lg:block">
                                    {{ ucfirst(auth()->user()->name) }}
                                </span>

                                <!-- Arrow (desktop only) -->
                                <svg class="hidden h-4 w-4 text-gray-500 transition-transform duration-200 lg:block"
                                    :class="{ 'rotate-180': userMenu }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="userMenu" @click.outside="userMenu = false" y-transition
                                class="absolute right-0 mt-2 w-44 rounded-xl border border-gray-100 bg-white shadow-lg"
                                style="display: none">

                                <form method="POST" action="{{ route("logout") }}">
                                    @csrf
                                    <button type="submit"
                                        class="group flex w-full items-center gap-2 rounded-xl px-4 py-2 text-sm text-gray-700">

                                        <!-- Logout Icon -->
                                        <svg class="h-4 w-4 text-gray-700 transition group-hover:text-red-600"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m16 17 5-5-5-5" />
                                            <path d="M21 12H9" />
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        </svg>
                                        <!-- Text -->
                                        <span class="transition group-hover:text-red-600">
                                            Logout
                                        </span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endauth

                    <!-- Mobile Hamburger -->
                    <button @click="open = true" class="text-gray-700 focus:outline-none lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                </div>

            </div>
        </header>

        <!-- Overlay -->
        <div x-show="open" @click="open = false" class="fixed inset-0 z-40 bg-black/10 lg:hidden"></div>

        <!-- Sidebar (Mobile Menu) -->
        <div class="fixed left-0 top-0 z-50 h-full w-64 transform bg-white shadow-lg transition-transform duration-300 lg:hidden"
            style="display: none" x-show="open" x-transition:enter="transform transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="flex items-center justify-between border-b p-4">
                <div class="flex items-center space-x-2">
                    <div
                        class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full border bg-white">
                        <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ $settings->site_name }}"
                            class="h-full w-full object-contain" />
                    </div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ $settings->site_name }}</h2>
                </div>

                <button @click="open = false" class="text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col space-y-4 p-4 text-gray-700">
                <a href="{{ route("frontend.home-page") }}" class="hover:text-[#00B686]">Home</a>
                <a href="{{ route("frontend.service") }}" class="hover:text-[#00B686]">Services</a>
                {{-- <a href="#" class="hover:text-[#00B686]">How CareOn Works</a> --}}
                <a href="{{ route("frontend.blogs") }}" class="hover:text-[#00B686]">Health Tips</a>
                <a href="{{ route("frontend.contact-us") }}" class="hover:text-[#00B686]">Contact</a>
                <a href="{{ route("frontend.about") }}" class="hover:text-[#00B686]">About Us</a>

                <hr class="my-4" />

                {{-- <a href="#" class="hover:text-[#00B686]">Search</a> --}}
                {{-- <a href="provider-signup.html" class="hover:text-[#00B686]">Register As Care Provider</a> --}}
                <a href="{{ route("login") }}" class="hover:text-[#00B686]">Sign In</a>
                <a href="{{ route("frontend.service") }}"
                    class="mt-2 rounded-md bg-[#00B686] px-4 py-2 text-center text-sm font-medium text-white hover:bg-[#00976F]">
                    Book Now
                </a>
            </nav>
        </div>
    </div>
</div>
