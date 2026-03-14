<!-- Footer -->
<footer class="bg-[#1D64B4] py-12 text-white">
    <div class="mx-auto grid grid-cols-1 gap-10 px-4 md:grid-cols-4">
        <!-- Brand -->
        {{-- <div>
            <div class="mb-3 flex items-center space-x-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#17C964] font-bold text-white">
                    C
                </div>
                <div>
                    <h2 class="text-lg font-semibold">CareOn</h2>
                    <p class="text-sm text-gray-300">Care, always on</p>
                </div>
            </div>
            <p class="mb-3 text-sm leading-relaxed text-gray-300">
                {{ $settings->meta_description }}
            </p>
            <p class="text-sm font-medium text-[#F9A826]">A Techutre brand</p>
        </div> --}}

        <div>
            <div class="mb-3 flex items-center space-x-3">
                <div class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white">
                    <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ $settings->site_name }}"
                        class="h-full w-full object-contain" />
                </div>

                <div>
                    <h2 class="text-lg font-semibold">{{ $settings->site_name }}</h2>
                    <p class="text-sm text-gray-300">Care, always on</p>
                </div>
            </div>

            <p class="mb-2 text-sm font-medium text-[#F9A826]">A Techutre brand</p>

            <p class="mb-4 text-sm leading-relaxed text-gray-300">
                {{ $settings->meta_description }}
            </p>

            <!-- Social Icons -->
            <div class="mb-4 flex items-center space-x-3">
                <!-- Facebook -->
                <a href="{{ $settings->facebook }}"
                    class="group flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#1877F2] transition-all duration-300 hover:scale-110 hover:bg-[#1877F2] hover:text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22 12a10 10 0 1 0-11.56 9.88v-7h-2.3v-2.88h2.3V9.8c0-2.27 1.35-3.53 3.42-3.53.99 0 2.03.18 2.03.18v2.23h-1.14c-1.12 0-1.47.7-1.47 1.42v1.7h2.5l-.4 2.88h-2.1v7A10 10 0 0 0 22 12Z" />
                    </svg>
                </a>

                <!-- Youtube -->
                <a href="{{ $settings->youtube }}"
                    class="group flex h-9 w-9 items-center justify-center rounded-full bg-white text-red-500 transition-all duration-300 hover:scale-110 hover:bg-red-500 hover:text-white">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                        <path d="m10 15 5-3-5-3z" />
                    </svg>
                </a>

                <!-- LinkedIn -->
                <a href="{{ $settings->linkedin }}"
                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#0A66C2] transition-all duration-300 hover:scale-110 hover:bg-[#0A66C2] hover:text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.4 20.4h-3.6v-5.6c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.7H9.3V9h3.4v1.6h.1c.5-.9 1.7-1.8 3.4-1.8 3.6 0 4.2 2.4 4.2 5.4v6.2ZM5.3 7.4a2.1 2.1 0 1 1 0-4.2 2.1 2.1 0 0 1 0 4.2ZM7.1 20.4H3.6V9h3.5v11.4Z" />
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="{{ $settings->instagram }}"
                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-pink-500 transition-all duration-300 hover:scale-110 hover:bg-gradient-to-tr hover:from-pink-500 hover:via-red-500 hover:to-yellow-400 hover:text-white">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7Zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10Zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5Zm0 7.3A2.8 2.8 0 1 1 14.8 12 2.8 2.8 0 0 1 12 14.8Zm4.7-7.9a1.1 1.1 0 1 0 1.1 1.1 1.1 1.1 0 0 0-1.1-1.1Z" />
                    </svg>
                </a>
            </div>

        </div>

        <!-- Services -->
        {{-- <div>
            <h3 class="mb-3 text-base font-semibold">Healthcare Services</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                @foreach ($services as $service)
                    <li>
                        <button wire:click="redirectToServiceForm('{{ $service->slug }}')"
                            class="text-left transition hover:text-white hover:underline">
                            {{ $service->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div> --}}
        <div>
            <h3 class="mb-3 text-base font-semibold">Healthcare Services</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                @foreach ($services as $service)
                    <li>
                        <button wire:click="redirectToServiceForm('{{ $service->slug }}')"
                            class="text-left transition hover:text-white hover:underline">
                            {{ $service->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>



        <!-- Company -->
        <div>
            <h3 class="mb-3 text-base font-semibold">Company</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>
                    <a href="{{ route("frontend.about") }}"
                        class="text-left transition hover:text-white hover:underline">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route("frontend.contact-us") }}"
                        class="text-left transition hover:text-white hover:underline">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="{{ route("frontend.provider-signup") }}"
                        class="text-left transition hover:text-white hover:underline">
                        Be Care Provider
                    </a>
                </li>
            </ul>

            {{-- <h3 class="mb-3 mt-6 text-base font-semibold">Legal</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Terms of Service</li>
                <li>Privacy Policy</li>
                <li>Refund Policy</li>
            </ul> --}}
        </div>

        <!-- Contact -->
        <div>
            <h3 class="mb-3 text-base font-semibold">Get in Touch</h3>
            <ul class="space-y-4 text-sm text-gray-300">
                <li class="flex items-start space-x-3">
                    <svg class="mt-1 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path
                            d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                    </svg>
                    <div>
                        <p>{{ $settings->phone }} (<span>what's app</span>)</p>
                        <p class="text-xs">24/7 Support</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mt-1 h-4 w-4 flex-shrink-0">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <p>{{ $settings->email }}</p>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mt-1 h-4 w-4 flex-shrink-0">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p>{{ $settings->address }}</p>
                </li>
            </ul>
        </div>
    </div>

    {{-- <div class="mt-10 border-t border-white/20 pt-6 text-center text-sm text-gray-400">
        © 2026 <span class="font-normal">{{ $settings->site_name }}</span>. All rights reserved. A
        Techutre brand.
    </div> --}}
    <div class="mt-10 space-y-2 border-t border-white/20 pt-6 text-center text-sm text-gray-400">

        <p>
            © 2026
            <span class="font-normal text-white">
                {{ $settings->site_name }}
            </span>.
            All rights reserved.
        </p>

        <p class="tracking-wide">
            Designed & Developed by
            <a href="https://bdtechture.com/" target="_blank"
                class="font-medium text-white transition duration-300 hover:text-amber-500">
                Techture
            </a>
        </p>

    </div>

</footer>
