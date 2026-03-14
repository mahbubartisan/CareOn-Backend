<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
           Emergency Nursing Booking Detail
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Emergency Nursing Booking Detail</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="mb-5 flex justify-end">
        <button type="button" wire:click="downloadInvoice"
            class="inline-flex items-center gap-1.5 rounded-md bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-teal-700">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 17V3" />
                <path d="m6 11 6 6 6-6" />
                <path d="M19 21H5" />
            </svg>
            Download Invoice
        </button>
    </div>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

        <!-- LEFT CARD -->
        <div class="rounded-xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Booking Summary
            </h2>

            <div class="space-y-4 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Booking ID</span>
                    <span class="font-semibold text-gray-900">
                        #{{ $booking->booking_id }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Location Group</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->location_group ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Location Name</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->location_name ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Location Charge</span>
                    <span class="font-semibold text-teal-600">
                        ৳ {{ $booking->location_price ?: 0 }}
                    </span>
                </div>

                <div class="flex items-start justify-between">
                    <span class="text-gray-500">Selected Services</span>

                    <ul class="max-w-xs list-disc space-y-2 pl-5 text-sm">
                        @foreach ($booking->selected_services as $service)
                            <li>
                                <div class="flex justify-between gap-4">
                                    <span class="font-semibold text-gray-900">{{ $service["name"] }}</span>
                                    <span class="font-semibold text-teal-600">
                                        ৳ {{ number_format((float) $service["price"]) }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Total Price</span>
                    <span class="font-semibold text-teal-700">
                        ৳ {{ number_format($booking->total_price) }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Created By</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->user?->name }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Booking For</span>
                    <span class="font-semibold text-gray-900">
                        {{ ucfirst($booking->booking_for) ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Payment Method</span>
                    <span class="font-semibold text-gray-900">
                        {{ ucfirst($booking->payment_method) ?: "N/A" }}
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT CARD -->
        <div class="rounded-xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Patient Details
            </h2>

            <div class="space-y-4 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Patient Name</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->name ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Age</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->age ?: "N/A" }} Years
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Height</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->height ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Weight</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->weight ?: "N/A" }}Kg
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Gender</span>
                    <span class="font-semibold text-gray-900">
                        {{ ucfirst(@$booking->patient?->gender ?: "N/A") }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Patient Contact</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->patient_contact ?: "N/A" }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Emergency Contact</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->emergency_contact ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Nationality</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->patient?->patient_type ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Address</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ @$booking->patient?->address }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Gender Preference</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ @$booking->patient?->gender_preference ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Language Preference</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ @$booking->patient?->language ?: "N/A" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Important Information</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ @$booking->patient?->special_notes ?: "N/A" }}
                    </span>
                </div>
            </div>
        </div>

    </div>


    <!-- BACK BUTTON -->
    <div class="my-5">
        <a href="{{ route("nursing.booking") }}"
            class="inline-flex items-center gap-2 rounded-md bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm">

            <!-- SVG Icon -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 8L2 12L6 16" />
                <path d="M2 12H22" />
            </svg>
            Back to List
        </a>
    </div>
</div>
