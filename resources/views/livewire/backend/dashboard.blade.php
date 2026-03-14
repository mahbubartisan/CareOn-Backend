<div>
    <!-- Content header -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Dashboard
        </h2>
    </div>

    <div class="mt-6">
        <!-- card sections here -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Special Services -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5">
                            <path
                                d="M19.5 13.572L12 21l-2.896-2.868m-6.117-8.104A5 5 0 0 1 12 7.006a5 5 0 1 1 7.5 6.572" />
                            <path d="M3 13h2l2 3l2-6l1 3h3" />
                        </g>
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $specialCareCount ?? 0 }}</p>
                <p class="text-sm text-gray-500">Special Services</p>
            </div>

            <!-- Medical Services -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path
                                d="M2 14c0-3.771 0-5.657 1.172-6.828S6.229 6 10 6h4c3.771 0 5.657 0 6.828 1.172S22 10.229 22 14s0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14Zm14-8c0-1.886 0-2.828-.586-3.414S13.886 2 12 2s-2.828 0-3.414.586S8 4.114 8 6" />
                            <path stroke-linecap="round" d="M13.5 14h-3m1.5-1.5v3" />
                            <circle cx="12" cy="14" r="4" />
                        </g>
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $medicalCareCount ?? 0 }}</p>
                <p class="text-sm text-gray-500">Medical Services</p>
            </div>

            <!-- Patients -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-teal-600 text-white">
                    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M11.5 6A3.514 3.514 0 0 0 8 9.5c0 1.922 1.578 3.5 3.5 3.5S15 11.422 15 9.5S13.422 6 11.5 6m9 0A3.514 3.514 0 0 0 17 9.5c0 1.922 1.578 3.5 3.5 3.5S24 11.422 24 9.5S22.422 6 20.5 6m-9 2c.84 0 1.5.66 1.5 1.5s-.66 1.5-1.5 1.5s-1.5-.66-1.5-1.5s.66-1.5 1.5-1.5m9 0c.84 0 1.5.66 1.5 1.5s-.66 1.5-1.5 1.5s-1.5-.66-1.5-1.5s.66-1.5 1.5-1.5M7 12c-2.2 0-4 1.8-4 4c0 1.113.477 2.117 1.219 2.844A5.04 5.04 0 0 0 2 23h2c0-1.668 1.332-3 3-3s3 1.332 3 3h2a5.04 5.04 0 0 0-2.219-4.156C10.523 18.117 11 17.114 11 16c0-2.2-1.8-4-4-4m5 11c-.625.836-1 1.887-1 3h2c0-1.668 1.332-3 3-3s3 1.332 3 3h2a5.02 5.02 0 0 0-1-3c-.34-.453-.75-.84-1.219-1.156C19.523 21.117 20 20.114 20 19c0-2.2-1.8-4-4-4s-4 1.8-4 4c0 1.113.477 2.117 1.219 2.844A5 5 0 0 0 12 23m8 0h2c0-1.668 1.332-3 3-3s3 1.332 3 3h2a5.04 5.04 0 0 0-2.219-4.156C28.523 18.117 29 17.114 29 16c0-2.2-1.8-4-4-4s-4 1.8-4 4c0 1.113.477 2.117 1.219 2.844A5.04 5.04 0 0 0 20 23M7 14c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2m18 0c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2m-9 3c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalPatients ?? 0 }}</p>
                <p class="text-sm text-gray-500">Patients</p>
            </div>

            <!-- Health Tips -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M8.5 6.5A.5.5 0 0 1 9 6h1.5a.5.5 0 0 1 0 1H9a.5.5 0 0 1-.5-.5m0 4A.5.5 0 0 1 9 10h1.5a.5.5 0 0 1 0 1H9a.5.5 0 0 1-.5-.5M5.499 8a.5.5 0 0 1-.353-.146l-.5-.5a.5.5 0 0 1 .707-.707l.146.146l1.146-1.146a.5.5 0 0 1 .707.707l-1.5 1.5A.5.5 0 0 1 5.499 8m-.353 3.854a.5.5 0 0 0 .706 0l1.5-1.5a.5.5 0 0 0-.707-.707l-1.146 1.146l-.146-.146a.5.5 0 0 0-.707.707zM5.085 2A1.5 1.5 0 0 1 6.5 1h3a1.5 1.5 0 0 1 1.415 1h.585A1.5 1.5 0 0 1 13 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 13.5v-10A1.5 1.5 0 0 1 4.5 2zM6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM5.085 3H4.5a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5h-.585A1.5 1.5 0 0 1 9.5 4h-3a1.5 1.5 0 0 1-1.415-1m.414 9" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalBlogs ?? 0 }}</p>
                <p class="text-sm text-gray-500">Health Tips</p>
            </div>

            <!-- Packages -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="m14.447 3.724l-6-3a1 1 0 0 0-.894 0l-6 3A1 1 0 0 0 1 4.618v6.764a1 1 0 0 0 .553.894l6 3a1 1 0 0 0 .894 0l6-3a1 1 0 0 0 .553-.894V4.618a1 1 0 0 0-.553-.894M5.871 5.897l5.343-2.672l2.158 1.079L8 6.943ZM8 1.618l2.096 1.048l-5.353 2.677l-2.115-1.039ZM2 5.11l2.25 1.105V9a.5.5 0 0 0 1 0V6.706L7.5 7.811v6.321L2 11.382Zm6.5 9.022v-6.32L14 5.11v6.272Z" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalPackages ?? 0 }}</p>
                <p class="text-sm text-gray-500">Packages</p>
            </div>

            <!-- Labs -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-violet-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M17.5 21a3.5 3.5 0 0 1-3.5-3.5V3h7v14.5a3.5 3.5 0 0 1-3.5 3.5Z" />
                            <path stroke-linecap="round" d="M22 3h-9m4 4h-3" />
                            <path stroke-linejoin="round"
                                d="M10 16.875C10 19.913 8 21 6 21s-4-1.087-4-4.125S6 10 6 10s4 3.837 4 6.875Z" />
                            <path stroke-linecap="round"
                                d="M14 12c1.083-.866 2.297-2.122 3.771-1.237c1.23.738 2.263-.039 3.229-.763" />
                        </g>
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalLabs ?? 0 }}</p>
                <p class="text-sm text-gray-500">Labs</p>
            </div>

            <!-- Advisors -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-cyan-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5"
                            d="M2.25 6a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0M4.5 9.75A3.75 3.75 0 0 0 .75 13.5v2.25h1.5l.75 6h3M17.25 6a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25 3.75a3.75 3.75 0 0 1 3.75 3.75v2.25h-1.5l-.75 6h-3m-9-18a3 3 0 1 0 6 0a3 3 0 0 0-6 0m8.25 9.75a5.25 5.25 0 1 0-10.5 0v2.25H9l.75 7.5h4.5l.75-7.5h2.25z" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalAdvisors ?? 0 }}</p>
                <p class="text-sm text-gray-500">Advisors</p>
            </div>

            <!-- Care Providers -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M28.4 124.8a6 6 0 0 0 8.4-1.2a54 54 0 0 1 86.4 0a6 6 0 0 0 8.4 1.19a5.6 5.6 0 0 0 1.19-1.19a54 54 0 0 1 86.4 0a6 6 0 0 0 9.6-7.21a65.74 65.74 0 0 0-29.69-22.26a38 38 0 1 0-46.22 0A65.3 65.3 0 0 0 128 110.7a65.3 65.3 0 0 0-24.89-16.57a38 38 0 1 0-46.22 0A65.7 65.7 0 0 0 27.2 116.4a6 6 0 0 0 1.2 8.4M176 38a26 26 0 1 1-26 26a26 26 0 0 1 26-26m-96 0a26 26 0 1 1-26 26a26 26 0 0 1 26-26m119.11 160.13a38 38 0 1 0-46.22 0A65.3 65.3 0 0 0 128 214.7a65.3 65.3 0 0 0-24.89-16.57a38 38 0 1 0-46.22 0A65.7 65.7 0 0 0 27.2 220.4a6 6 0 1 0 9.6 7.2a54 54 0 0 1 86.4 0a6 6 0 0 0 8.4 1.19a5.6 5.6 0 0 0 1.19-1.19a54 54 0 0 1 86.4 0a6 6 0 0 0 9.6-7.21a65.74 65.74 0 0 0-29.68-22.26M80 142a26 26 0 1 1-26 26a26 26 0 0 1 26-26m96 0a26 26 0 1 1-26 26a26 26 0 0 1 26-26" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">{{ $totalCareProviders ?? 0 }}</p>
                <p class="text-sm text-gray-500">Care Providers</p>
            </div>
            {{-- 
            <!-- News -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-sky-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                        <path d="M8 8l4 0" />
                        <path d="M8 12l4 0" />
                        <path d="M8 16l4 0" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">5</p>
                <p class="text-sm text-gray-500">Bookings</p>
            </div>

            <!-- Sponsors -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        <path
                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                        <path d="M12.5 15.5l2 2" />
                        <path d="M15 13l2 2" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">4</p>
                <p class="text-sm text-gray-500">Advisors</p>
            </div>
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        <path
                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                        <path d="M12.5 15.5l2 2" />
                        <path d="M15 13l2 2" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">4</p>
                <p class="text-sm text-gray-500">Advisors</p>
            </div> --}}
        </div>
    </div>
</div>
