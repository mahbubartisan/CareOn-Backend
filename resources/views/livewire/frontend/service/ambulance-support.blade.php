<div>
    <section class="mx-auto px-4 pb-16 pt-28">
        <!-- Back -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <!-- Back -->
            <a href="{{ route("frontend.service") }}"
                class="flex items-center text-sm text-gray-600 transition hover:text-gray-900">
                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Services
            </a>

            <!-- Helpline -->
            <div class="flex items-center text-sm text-gray-600">
                <span class="mr-2">Helpline:</span>
                <a href="tel:+880 131 955 2222" class="font-medium text-green-600">
                    +880 131 955 2222
                </a>
            </div>
        </div>

        <div class="mx-auto max-w-7xl">

            <!-- Label: Service Type -->
            <span
                class="mb-3 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                {{ @$service->type?->name }}
            </span>

            <!-- Title -->
            <h1 class="mb-2 text-3xl font-bold text-gray-900">
                {{ @$service->name }}
            </h1>

            <!-- Short Description -->
            <p class="max-w-7xl text-gray-600">
                {{ @$service->short_desc }}
            </p>
        </div>

        <div class="mx-auto max-w-4xl py-8">
            <div class="rounded-xl border p-6">
                <h2 class="mb-6 flex items-center gap-3 text-2xl font-semibold text-gray-900">
                    <!-- Icon Circle -->
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-teal-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <title xmlns="">ambulance</title>
                            <g fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 18h4M13.5 8h.943c1.31 0 1.966 0 2.521.315c.556.314.926.895 1.667 2.056c.52.814 1.064 1.406 1.831 1.931c.772.53 1.14.789 1.343 1.204c.195.398.195.869.195 1.811c0 1.243 0 1.864-.349 2.259l-.046.049c-.367.375-.946.375-2.102.375H19M5 18c-1.414 0-2.121 0-2.56-.44C2 17.122 2 16.415 2 15V8c0-1.414 0-2.121.44-2.56C2.878 5 3.585 5 5 5h5.5c1.414 0 2.121 0 2.56.44c.44.439.44 1.146.44 2.56v10H9m13-3h-1M8 9v4m2-2H6" />
                                <circle cx="17" cy="18" r="2" />
                                <circle cx="7" cy="18" r="2" />
                            </g>
                        </svg>
                    </span>

                    Hire an Ambulance
                </h2>
                <!-- NOTE -->
                <p class="mb-4 rounded-lg border-l-4 border-red-500 bg-red-50 px-3 py-2 text-xs text-gray-700">
                    Fields marked with <span class="font-bold text-red-600">*</span> are required.
                </p>
                <form class="space-y-6">
                    <!-- Patient Type -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-900">
                            Booking For <span class="text-red-500">*</span>
                        </label>

                        <div class="flex gap-6">
                            <label class="flex cursor-pointer items-center gap-2 text-sm">
                                <input type="radio" wire:model.live="form.bookingFor" value="self"
                                    class="text-teal-500 focus:ring-teal-500">
                                Self
                            </label>

                            <label class="flex cursor-pointer items-center gap-2 text-sm">
                                <input type="radio" wire:model.live="form.bookingFor" value="other"
                                    class="text-teal-500 focus:ring-teal-500">
                                Someone Else
                            </label>
                        </div>
                    </div>

                    <!-- Patient Information -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Patient Information</h3>
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">Patient Name <span
                                            class="text-red-500">*</span>
                                        <input type="text" wire:model="form.patient_name"
                                            @disabled($form->bookingFor === "self") placeholder="Enter patient name"
                                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none disabled:cursor-not-allowed">
                                        @error("form.patient_name")
                                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">Patient Age <span
                                            class="text-red-500">*</span>
                                        <input type="number" wire:model="form.patient_age"
                                            placeholder="Enter age (e.g. 32)"
                                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                        @error("form.patient_age")
                                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

                                <!-- Gender -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Gender <span class="text-red-500">*</span>
                                    </label>

                                    <select wire:model="form.gender"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                        <option value="" hidden>-- Select one --</option>
                                        @foreach (\App\Enums\Gender::values() as $gender)
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>

                                    @error("form.gender")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>

                                    <input type="email" wire:model="form.email" @disabled($form->bookingFor === "self")
                                        placeholder="Email Address"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none disabled:cursor-not-allowed">

                                    @error("form.email")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Nationality -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Nationality <span class="text-red-500">*</span>
                                    </label>

                                    <select wire:model="form.nationality"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-[13px] text-sm focus:border-teal-500 focus:outline-none">
                                        <option value="" hidden>-- Select one --</option>
                                        @foreach (\App\Enums\Nationality::values() as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>

                                    @error("form.nationality")
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Contact Details</h3>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Contact Person <span
                                        class="text-red-500">*</span>
                                    <input type="text" wire:model="form.contact_person" placeholder="Full name"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none disabled:cursor-not-allowed">
                                    @error("form.contact_person")
                                        <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Mobile Number <span
                                        class="text-red-500">*</span>
                                    <input type="number" wire:model="form.phone" placeholder="+880 XXXXXXXX"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none disabled:cursor-not-allowed">
                                    @error("form.phone")
                                        <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Location Details -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Pickup & Destination</h3>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Pickup Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" wire:model="form.pickup_address"
                                        placeholder="Pickup location"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    @error("form.pickup_address")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Destination Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" wire:model="form.destination_address"
                                        placeholder="Hospital or destination"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    @error("form.destination_address")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ambulance Details -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Ambulance Details</h3>

                        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3">

                            <!-- Ambulance Type -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Ambulance Type <span class="text-red-500">*</span>
                                </label>

                                <select wire:model="form.ambulance_type"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    @foreach (\App\Enums\AmbulanceType::values() as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>

                                @error("form.ambulance_type")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Booking Type -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Booking Type <span class="text-red-500">*</span>
                                </label>

                                <select wire:model="form.booking_type"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    <option value="Emergency">For Emergency</option>
                                    <option value="Advanced">For Advanced Booking</option>
                                </select>

                                @error("form.booking_type")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pickup Date & Time -->
                            <div x-data x-init="flatpickr($refs.pickupDateTime, {
                                enableTime: true,
                                dateFormat: 'Y-m-d h:i K',
                                minDate: 'today',
                                defaultDate: @entangle("form.pickup_datetime").defer,
                                onChange: function(selectedDates, dateStr) {
                                    $wire.set('form.pickup_datetime', dateStr);
                                }
                            });">
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Pickup Date & Time <span class="text-red-500">*</span>
                                </label>

                                <input type="text" x-ref="pickupDateTime" wire:ignore
                                    placeholder="Select Date & Time"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">

                                @error("form.pickup_datetime")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Additional Services -->
                    <div>
                        <label class="mb-3 block text-sm font-medium text-gray-900">
                            Additional Services <span class="text-xs text-gray-400">(if required)</span>
                        </label>

                        <div class="grid gap-3 sm:grid-cols-3">

                            <!-- Care Giver -->
                            <label class="cursor-pointer">
                                <input type="radio" wire:model="form.service" id="care_giver" value="Care Giver"
                                    class="peer hidden" />

                                <div
                                    class="flex items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-teal-300 hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">

                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-teal-100 font-semibold text-teal-600">
                                        CG
                                    </span>

                                    <span class="text-sm font-medium text-gray-800">
                                        Care Giver
                                    </span>
                                </div>
                            </label>

                            <!-- Nurse -->
                            <label class="cursor-pointer">
                                <input type="radio" wire:model="form.service" id="nurse" value="Nurse"
                                    class="peer hidden" />

                                <div
                                    class="flex items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-teal-300 hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">

                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-teal-100 font-semibold text-teal-600">
                                        N
                                    </span>

                                    <span class="text-sm font-medium text-gray-800">
                                        Nurse
                                    </span>
                                </div>
                            </label>

                            <!-- Attendant -->
                            <label class="cursor-pointer">
                                <input type="radio" wire:model="form.service" id="attendant" value="Patient Attendant"
                                    class="peer hidden" />

                                <div
                                    class="flex items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-teal-300 hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">

                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-teal-100 font-semibold text-teal-600">
                                        A
                                    </span>

                                    <span class="text-sm font-medium text-gray-800">
                                        Patient Attendant
                                    </span>
                                </div>
                            </label>
                        </div>

                    </div>

                    <!-- Additional Notes -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-900">
                            Additional Notes <span class="text-xs text-gray-400">(if any)</span>
                        </label>
                        <textarea wire:model="form.notes" rows="3" placeholder="Any special instructions"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        @error("form.notes")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        @auth
                            <button type="button" wire:click.prevent="book"
                                class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600">
                                Confirm Booking
                            </button>
                        @else
                            <button type="button" wire:click="redirectToLogin"
                                class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600">
                                Confirm Booking
                            </button>
                        @endauth
                    </div>
                    <!--  Loading Spinner -->
                    {{-- <div class="flex justify-end">

                        @auth
                            <button type="button" wire:click.prevent="book" wire:loading.attr="disabled"
                                wire:target="book"
                                class="flex items-center justify-center gap-2 rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600 disabled:cursor-not-allowed disabled:opacity-70">

                                <!-- Spinner -->
                                <svg wire:loading wire:target="book" class="h-4 w-4 animate-spin text-white"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M21 12a9 9 0 1 1-6.219-8.56" />
                                </svg>

                                <!-- Normal text -->
                                <span wire:loading.remove wire:target="book">
                                    Confirm Booking
                                </span>

                                <!-- Processing text -->
                                <span wire:loading wire:target="book">
                                    Processing...
                                </span>

                            </button>
                        @else
                            <button type="button" wire:click="redirectToLogin" wire:loading.attr="disabled"
                                wire:target="redirectToLogin"
                                class="flex items-center justify-center gap-2 rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600 disabled:cursor-not-allowed disabled:opacity-70">

                                <svg wire:loading wire:target="redirectToLogin" class="h-4 w-4 animate-spin text-white"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M21 12a9 9 0 1 1-6.219-8.56" />
                                </svg>

                                <span wire:loading.remove wire:target="redirectToLogin">
                                    Confirm Booking
                                </span>

                                <span wire:loading wire:target="redirectToLogin">
                                    Redirecting...
                                </span>

                            </button>
                        @endauth

                    </div> --}}

                </form>
            </div>
        </div>
    </section>

    @push("title")
        {{ @$service->name }}
    @endpush
</div>
