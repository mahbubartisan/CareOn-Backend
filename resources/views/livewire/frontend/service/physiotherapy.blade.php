<div>
    <div x-data="{
        showStepper: false,
        agree: false,
        step: 1,
        formData: @entangle("bookingForm").live,
        locationGroups: @js($locationGroups),
        init() {
            if (!this.formData.nursingCare) {
                this.formData.nursingCare = [];
            }
        },
    
        // STATIC ASSESSMENT PRICE
        assessmentPrice: 1000,
    
        // LOCATION PRICE (Dynamic)
        get locationPrice() {
            let price = 0;
    
            if (this.formData.location) {
                const group = this.locationGroups.find(g =>
                    g.locations.some(loc =>
                        loc.name === this.formData.location
                    )
                );
    
                price = group ? Number(group.price) : 0;
            }
    
            return price;
        },
    
        // FINAL TOTAL
        get totalPrice() {
            return this.locationPrice + this.assessmentPrice;
        }
    }">
        <!-- SERVICE PAGE CONTENT -->
        <div x-show="!showStepper" y-transition>
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

                <div class="mx-auto max-w-4xl">

                    <!-- Label: Service Type -->
                    <span
                        class="mb-3 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                        {{ $service->type->name }}
                    </span>

                    <!-- Title -->
                    <h1 class="mb-2 text-3xl font-bold text-gray-900">
                        {{ $service->name }}
                    </h1>

                    <!-- Short Description -->
                    <p class="max-w-3xl text-gray-600">
                        {!! $service->short_desc !!}
                    </p>

                    <!-- CARE LEVELS -->
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        @foreach ($service->careLevels as $level)
                            <div
                                class="rounded-2xl border bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">

                                <!-- Care Level Name -->
                                <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                    {{ $level->name }}
                                </h3>

                                <!-- Care Level Description -->
                                <div class="description-list mb-4 text-sm text-gray-600">
                                    {!! $level->pivot->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Available Packages Section -->
                    <div class="mt-12 rounded-2xl border bg-[#F4F8FA] p-8">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 lg:text-2xl">
                            Available Packages
                        </h3>

                        <p class="mb-6 text-sm text-gray-600">
                            Select from our Daily or Monthly physiotherapy sessions based on required service duration
                            and level of medical attention.
                        </p>

                        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                            <!-- Daily Session -->
                            <div class="">
                                <h4 class="mb-4 text-lg font-semibold text-gray-900">
                                    Daily Session
                                </h4>

                                <ul class="space-y-3 text-sm text-gray-700">
                                    <li>
                                        <span class="font-medium text-gray-900">30-40 Minutes</span> – Basic Care
                                    </li>

                                    <li>
                                        <span class="font-medium text-gray-900">30-60 Minutes</span> – Standard Care
                                    </li>

                                    <li>
                                        <span class="font-medium text-gray-900">30-90 Minutes</span> – Critical Care
                                    </li>
                                </ul>
                            </div>

                            <!-- Monthly Session -->
                            <div class="">
                                <h4 class="mb-4 text-lg font-semibold text-gray-900">
                                    Monthly Session
                                </h4>

                                <ul class="space-y-3 text-sm text-gray-700">
                                    <li>
                                        <span class="font-medium text-gray-900">30-40 Minutes</span> – Basic Care
                                    </li>

                                    <li>
                                        <span class="font-medium text-gray-900">30-60 Minutes</span> – Standard Care
                                    </li>

                                    <li>
                                        <span class="font-medium text-gray-900">30-90 Minutes</span> – Critical Care
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- Additional Note -->
                    <div class="mt-5 rounded-lg border-l-4 border-amber-500 bg-amber-50 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 text-amber-600" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z" />
                            </svg>

                            <p class="text-sm text-amber-800">
                                <span class="font-semibold">Important:</span>
                                After the patient’s health assessment on the first day, the required number of
                                sessions will be determined.
                            </p>
                        </div>
                    </div>

                    <!-- Note: Show only if user is not logged in -->
                    @guest
                        <div class="mt-10 rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                            <p class="font-medium">
                                <strong>Note:</strong> To proceed with your booking, please
                                <a href="{{ route("login") }}" class="font-semibold text-green-700 hover:underline">
                                    sign in
                                </a>
                                or
                                <a href="{{ route("register") }}" class="font-semibold text-green-700 hover:underline">
                                    create an account
                                </a>
                                first.
                            </p>
                        </div>
                    @endguest

                    <!-- Book Button: Show only if user IS logged in -->
                    @auth
                        <div class="mt-12 text-center">
                            <a href="#"
                                @click.prevent="showStepper = true; $nextTick(() => window.scrollTo({top: 0, behavior: 'smooth'}))"
                                class="rounded-xl bg-teal-500 px-4 py-3 text-sm font-medium text-white shadow-md transition hover:bg-teal-600">
                                Book Now
                            </a>
                        </div>
                    @endauth

                </div>
            </section>
        </div>

        <!-- MULTI-STEP FORM SECTION -->
        <div x-show="showStepper" y-transition>
            <div class="mx-auto mt-8 max-w-4xl px-4 py-16">
                <!-- Stepper Navigation -->
                <nav class="mb-8 flex items-center justify-between text-xs text-gray-500">
                    <div class="flex-1">
                        <ul class="flex items-center justify-between">
                            <template x-for="n in 4" :key="n">
                                <li class="flex items-center space-x-2">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full text-[10px]"
                                        :class="{
                                            'bg-teal-600 text-white': step >= n,
                                            'border border-gray-200 text-gray-400': step < n
                                        }"
                                        x-text="n"></span>
                                    <span class="hidden sm:inline"
                                        x-text="['Location','Address','Review','Payment'][n-1]"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </nav>

                <!-- Step 1: Location -->
                <div x-show="step === 1" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">

                        <h3 class="mb-1 text-xl font-semibold lg:text-2xl">
                            Select Your Location in Dhaka
                        </h3>
                        <p class="mb-6 text-sm text-gray-500">
                            Choose your area to proceed
                        </p>

                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">

                            <!-- Generate 3 columns -->
                            @php
                                $chunks = $locationGroups->flatMap->locations
                                    ->pluck("name")
                                    ->chunk(ceil($locationGroups->flatMap->locations->count() / 3));
                            @endphp

                            @foreach ($chunks as $col)
                                <div class="space-y-3">
                                    @foreach ($col as $loc)
                                        <label class="flex items-center space-x-2 font-medium">
                                            <input type="radio" name="location" class="form-radio h-4 w-4"
                                                value="{{ $loc }}" wire:model.defer="bookingForm.location">
                                            <span>{{ $loc }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-6" />

                        <div class="flex items-center justify-between">
                            <button type="button"
                                @click="
                                            step > 1 ? step-- : showStepper = false;
                                            $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                                        "
                                class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back
                            </button>

                            <button type="button"
                                @click="
                                            if (formData.location) {
                                                step++;
                                                $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                                            }
                                        "
                                :disabled="!formData.location"
                                class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Next
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Patient Information -->
                <div x-show="step === 2" y-transition x-data="{
                    bookingFor: @entangle("bookingFor").live,
                    patientName: @entangle("bookingForm.patientName").live,
                    age: @entangle("bookingForm.age").live,
                    gender: @entangle("bookingForm.gender").live,
                    height: @entangle("bookingForm.height").live,
                    weight: @entangle("bookingForm.weight").live,
                    patientType: @entangle("bookingForm.patientType").live,
                    patientContact: @entangle("bookingForm.patientContact").live,
                    emergencyContact: @entangle("bookingForm.emergencyContact").live,
                    address: @entangle("bookingForm.address").live,
                    country: @entangle("bookingForm.country").live,
                
                    isValid() {
                        let baseValid =
                            this.patientName &&
                            this.age &&
                            this.gender &&
                            this.height &&
                            this.weight &&
                            this.patientType &&
                            this.patientContact &&
                            this.emergencyContact &&
                            this.address;
                
                        if (this.patientType === 'Foreigner') {
                            return baseValid && this.country;
                        }
                
                        return this.bookingFor && baseValid;
                    }
                }">

                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <!-- Title -->
                        <h3 class="mb-1 text-xl font-bold lg:text-2xl">
                            Complete Address
                        </h3>
                        <p class="mb-4 text-sm text-gray-500">
                            Provide detailed address information
                        </p>

                        <!-- NOTE -->
                        <p class="mb-4 rounded-lg border-l-4 border-red-500 bg-red-50 px-3 py-2 text-xs text-gray-700">
                            Fields marked with <span class="font-bold text-red-600">*</span> are required.
                        </p>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-900">
                                Booking For <span class="text-red-500">*</span>
                            </label>

                            <div class="flex gap-6">
                                <label class="flex cursor-pointer items-center gap-2 text-sm">
                                    <input type="radio" wire:model.live="bookingFor" value="self"
                                        class="text-teal-500 focus:ring-teal-500">
                                    Self
                                </label>

                                <label class="flex cursor-pointer items-center gap-2 text-sm">
                                    <input type="radio" wire:model.live="bookingFor" value="other"
                                        class="text-teal-500 focus:ring-teal-500">
                                    Someone Else
                                </label>
                            </div>
                        </div>

                        <!-- Address Form -->
                        <div class="mt-2 space-y-5">
                            <!-- Patient Name & Gender  -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Patient Name  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Patient Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Enter patient name"
                                        wire:model="bookingForm.patientName" :disabled="bookingFor === 'self'"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none disabled:cursor-not-allowed" />
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Gender <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Male -->
                                        <label class="relative">
                                            <input type="radio" name="gender" wire:model="bookingForm.gender"
                                                value="male" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Male
                                            </div>
                                        </label>

                                        <!-- Female -->
                                        <label class="relative">
                                            <input type="radio" name="gender" wire:model="bookingForm.gender"
                                                value="female" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Female
                                            </div>
                                        </label>

                                        <!-- Others -->
                                        <label class="relative">
                                            <input type="radio" name="gender" wire:model="bookingForm.gender"
                                                value="others" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Others
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Height & Weight -->
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Patient Age <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" placeholder="Age" wire:model="bookingForm.age"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Height <span
                                            class="text-red-500">*</span>
                                        <span class="text-xs font-normal text-gray-500">
                                            (Enter in feet and inches)
                                        </span>
                                    </label>
                                    <input type="text" placeholder="e.g., 5 ft 8 in"
                                        wire:model="bookingForm.height"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Weight <span
                                            class="text-red-500">*</span>
                                        <span class="text-xs font-normal text-gray-500">
                                            (Kg)
                                        </span>
                                    </label>
                                    <input type="number" placeholder="Weight" wire:model="bookingForm.weight"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Patient Type & Country  -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Type -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Patient Type <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                        <!-- Bangladeshi -->
                                        <label class="relative">
                                            <input type="radio" name="patientType"
                                                wire:model="bookingForm.patientType" value="Bangladeshi"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Bangladeshi
                                            </div>
                                        </label>

                                        <!-- Foreigner -->
                                        <label class="relative">
                                            <input type="radio" name="patientType"
                                                wire:model="bookingForm.patientType" value="Foreigner"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Foreigner
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Country  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Country
                                        <span class="text-xs font-normal text-gray-500">
                                            (If foreigner, please enter your country name)
                                        </span>
                                    </label>
                                    <input type="text" placeholder="Enter country name"
                                        wire:model="bookingForm.country"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Contact Phones -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Patient Contact
                                        <span class="text-red-500">*</span></label>
                                    <input type="number" placeholder="+880 1XXX-XXXXXX"
                                        wire:model="bookingForm.patientContact"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Emergency Contact
                                        <span class="text-red-500">*</span></label>
                                    <input type="number" placeholder="+880 1XXX-XXXXXX"
                                        wire:model="bookingForm.emergencyContact"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Full Address -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Full Address <span
                                        class="text-red-500">*</span></label>
                                <textarea wire:model="bookingForm.address" rows="3" placeholder="House/Flat number, Road, Block"
                                    class="w-full resize-none rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none"></textarea>
                            </div>

                            <!-- Preferences -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Gender Preference -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Gender Preference
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <!-- Male Nurse -->
                                        <label class="relative">
                                            <input type="radio" name="genderPreference"
                                                wire:model="bookingForm.genderPreference" value="Male Nurse"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Male Nurse
                                            </div>
                                        </label>

                                        <!-- Female Nurse -->
                                        <label class="relative">
                                            <input type="radio" name="genderPreference"
                                                wire:model="bookingForm.genderPreference" value="Female Nurse"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Female Nurse
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Language Preference  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Language Preference
                                    </label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Bengali -->
                                        <label class="relative">
                                            <input type="radio" name="language" wire:model="bookingForm.language"
                                                value="Bengali" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Bengali
                                            </div>
                                        </label>

                                        <!-- English -->
                                        <label class="relative">
                                            <input type="radio" name="language" wire:model="bookingForm.language"
                                                value="English" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                English
                                            </div>
                                        </label>

                                        <!-- Both -->
                                        <label class="relative">
                                            <input type="radio" name="language" wire:model="bookingForm.language"
                                                value="Both" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Both
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Important Information -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Important Information
                                    <span class="text-xs font-normal text-gray-500">(if any)</span>
                                </label>
                                <textarea rows="3" placeholder="Any medical conditions, allergies, or specific requirements..."
                                    wire:model="bookingForm.specialInstructions"
                                    class="w-full resize-none rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none"></textarea>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="my-6" />

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between">
                            <!-- Back Button -->
                            <button type="button"
                                @click="
                            step--;
                            $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                            "
                                class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back
                            </button>

                            <!-- Next Button -->
                            <button type="button"
                                @click="
                                    step++;
                                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                                "
                                :disabled="!isValid()" :class="!isValid() ? 'opacity-50 cursor-not-allowed' : ''"
                                class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Next
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Review & Confirm -->
                <div x-show="step === 3" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">

                        <!-- Header -->
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 lg:text-2xl">
                                Review & Confirm
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                Please review your booking details
                            </p>
                        </div>

                        <div class="space-y-4 rounded-xl border border-gray-200 p-5 text-sm">

                            <h3 class="mb-4 text-lg font-bold text-gray-900">
                                Booking Summary
                            </h3>
                            {{-- <div>
                                <span class="text-gray-600">Service Name:</span>
                            </div>
                            <!-- Selected Services -->
                            <template x-for="srv in selectedServices" :key="'review-' + srv.id">
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-900" x-text="srv.name"></span>
                                    <span class="font-semibold text-gray-900" x-text="'৳ ' + srv.price"></span>
                                </div>
                            </template> --}}
                            <div class="flex justify-between pt-3">
                                <span class="font-medium text-gray-900">Service Name:</span>
                                <span class="font-semibold text-gray-900">Assessment</span>
                            </div>

                            <!-- Location Charge -->
                            {{-- <div class="flex justify-between border-t pt-3">
                                <span class="text-gray-600">Location Charge:</span>
                                <span class="font-medium text-gray-900" x-text="'৳ ' + locationPrice"></span>
                            </div> --}}

                            <!-- Address -->
                            <div class="flex justify-between border-t pt-3">
                                <span class="font-medium text-gray-900">Patient Address:</span>
                                <span class="text-right font-semibold text-gray-900" x-text="formData.address">
                                </span>
                            </div>

                            <!-- TOTAL -->
                            <div
                                class="mt-4 flex justify-between border-t pt-4 text-[17px] font-semibold text-green-600">
                                <span>Total Price</span>
                                <span x-text="'৳ ' + totalPrice"></span>
                            </div>

                        </div>
                        <!-- Terms & Conditions -->
                        <div class="mb-8 mt-5 rounded-xl border border-emerald-300 bg-emerald-50/30 p-5">
                            <h3 class="mb-3 text-lg font-bold text-gray-900">
                                Terms & Conditions
                            </h3>
                            <ul class="list-inside list-disc space-y-1 text-sm text-gray-600">
                                <li>
                                    I authorize CareOn-verified professionals to enter the
                                    specified address for the booked service time.
                                </li>
                                <li>
                                    I agree to provide a safe working environment and comply
                                    with all safety guidelines.
                                </li>
                                <li>
                                    All personal and medical information will be kept
                                    confidential.
                                </li>
                                <li>
                                    I confirm that all information provided is accurate and
                                    complete.
                                </li>
                            </ul>

                            <div class="mt-4 flex items-center space-x-2 text-sm">
                                <input id="agree" type="checkbox" x-model="agree"
                                    class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                <label for="agree" class="text-gray-700">
                                    I have read and agree to the terms and conditions
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <!-- Back Button -->
                            <button type="button"
                                @click="
                            step--;
                            $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                        "
                                class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back
                            </button>

                            <!-- Next Button -->
                            <button type="button"
                                @click="
                            if (agree) {
                                step++;
                                $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                            }
                            "
                                :disabled="!agree"
                                :class="agree
                                    ?
                                    'flex items-center bg-green-600 hover:bg-green-700 text-white' :
                                    'flex items-center bg-green-300 text-white cursor-not-allowed'"
                                class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Confirm & Next
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Payment Method -->
                <div x-show="step === 4" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <!-- Header -->
                        <h3 class="mb-1 text-xl font-bold lg:text-2xl">Payment Method</h3>
                        <p class="mb-6 text-sm text-gray-500">
                            How would you like to pay?
                        </p>

                        <!-- Payment Options -->
                        <div class="space-y-3">
                            <!-- bKash Dynamic Method -->
                            {{-- <label
                                class="flex cursor-pointer items-center justify-between rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment_type === 'bkash' ? 'border-green-600 bg-green-50' :
                                    'border-gray-200'">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="payment_type" value="bkash"
                                        wire:model="bookingForm.payment_type" class="text-green-600 focus:ring-0" />
                                    <span class="font-medium text-gray-800">bKash</span>
                                </div>
                                <span
                                    class="rounded-full bg-green-100 px-2 py-0.5 text-[11px] font-medium text-green-700">Popular</span>
                            </label> --}}

                            <!-- bKash -->
                            {{-- <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="bookingForm.payment_type === 'bkash' ? 'border-green-600 bg-green-50' :
                                    'border-gray-200'">

                                <input type="radio" name="payment_type" value="bkash"
                                    wire:model.live="bookingForm.payment_type"
                                    class="mr-3 text-green-600 focus:ring-0" />

                                <span class="font-medium text-gray-800">bKash</span>
                            </label> --}}
                            <label class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition"
                                :class="formData.payment_type === 'bkash' ?
                                    'border-green-600 bg-green-50' :
                                    'border-gray-200 hover:border-green-600'">

                                <input type="radio" name="payment_type" value="bkash"
                                    x-model="formData.payment_type" class="mr-3 text-green-600 focus:ring-0" />

                                <span class="font-medium text-gray-800">
                                    bKash
                                </span>
                            </label>

                            <!-- bKash Info -->
                            <div x-show="formData.payment_type === 'bkash'" y-transition
                                class="mt-4 rounded-xl border border-pink-200 bg-pink-50 p-4 text-sm">

                                <p class="mb-2 font-semibold text-pink-700">bKash Payment Information</p>

                                <p>Send payment to: <strong>01319552222</strong></p>
                                {{-- <p>Type: Personal</p> --}}

                                {{-- <div class="mt-3">
                                    <label class="mb-1 block text-sm">Transaction ID</label>
                                    <input type="text" wire:model="bookingForm.transaction_id"
                                        placeholder="Enter your bKash transaction ID"
                                        class="w-full rounded-lg border px-3 py-2 text-sm">
                                </div> --}}
                            </div>

                            <!-- Bank Transfer -->
                            <label class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition"
                                :class="formData.payment_type === 'bank' ?
                                    'border-green-600 bg-green-50' :
                                    'border-gray-200 hover:border-green-600'">

                                <input type="radio" name="payment_type" value="bank"
                                    x-model="formData.payment_type" class="mr-3 text-green-600 focus:ring-0" />

                                <span class="font-medium text-gray-800">
                                    Bank Transfer
                                </span>

                            </label>

                            <!-- Bank Transfer Info -->
                            <div x-show="formData.payment_type === 'bank'" y-transition
                                class="mt-4 rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm">

                                <p class="mb-2 font-semibold text-blue-700">Bank Transfer Details</p>

                                <p>Bank: Dutch Bangla Bank Ltd (DBBL)</p>
                                <p>A/C Name: Techture </p>
                                <p>A/C No: 2081100009501</p>
                                <p>Routing No: 90261804</p>
                                <p>Branch: Vatara</p>

                                {{-- <div class="mt-3">
                                    <label class="mb-1 block text-sm">Transaction Reference</label>
                                    <input type="text" wire:model="bookingForm.transaction_id"
                                        placeholder="Enter bank reference number"
                                        class="w-full rounded-lg border px-3 py-2 text-sm">
                                </div> --}}
                            </div>

                            <!-- Cash On Delivery -->
                            <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment_type === 'COD' ? 'border-green-600 bg-green-50' :
                                    'border-gray-200'">
                                <input type="radio" name="payment_type" value="COD"
                                    wire:model="bookingForm.payment_type" class="mr-3 text-green-600 focus:ring-0" />
                                <span class="font-medium text-gray-800">Cash On Delivery</span>
                            </label>
                        </div>

                        <!-- Divider -->
                        <hr class="my-6" />

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between">
                            <!-- Back Button -->
                            <button type="button"
                                @click="
                            step--;
                            $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                        "
                                class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back
                            </button>
                            <button type="button" wire:click="processOrder"
                                class="rounded-xl bg-green-600 px-5 py-2 text-white">
                                Pay & Book
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .description-list ul {
            @apply mt-4 space-y-2 text-sm text-gray-700;
        }

        .description-list li {
            position: relative;
            padding-left: 2rem;
            list-style: none;
            margin-bottom: 0.9rem;
            @apply text-gray-700 leading-relaxed;
        }

        .description-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.15em;
            /* text-aligned */
            width: 1.25rem;
            height: 1.25rem;

            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2310B981' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M21.801 10A10 10 0 1 1 17 3.335'/%3E%3Cpath d='m9 11 3 3L22 4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>


    @push("title")
        {{ $service->name }}
    @endpush
</div>
