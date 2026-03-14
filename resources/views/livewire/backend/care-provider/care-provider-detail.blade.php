<div>
    <div class="mx-auto max-w-7xl space-y-10 px-4 py-8">

        <!-- Header -->
        <div
            class="flex flex-col gap-4 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ $form->provider->full_name }}
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Care Provider Profile
                </p>
            </div>

            <div class="flex flex-wrap gap-3 text-sm">
                <span class="rounded-full bg-blue-100 px-3 py-1 font-medium text-blue-700">
                    {{ ucfirst($form->provider->service_category) }}
                </span>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

            <!-- Left Column -->
            <div class="space-y-8 lg:col-span-2">

                <!-- Personal Info -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-lg font-semibold text-gray-900">Personal Information</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Full Name</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->full_name }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Phone</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->phone }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Email</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->email }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Date of Birth</p>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($form->provider->date_of_birth)->format("d M Y") }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Gender</p>
                            <p class="mt-1 text-sm text-gray-600">{{ ucfirst($form->provider->gender) }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">NID Number</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->nid_number }}</p>
                        </div>
                    </div>
                </div>

                <!-- Professional Info -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-lg font-semibold text-gray-900">Professional Information</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Service Category</p>
                            <p class="mt-1 text-sm text-gray-600">{{ ucfirst($form->provider->service_category) }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Experience</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->experience }} Years</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Qualification</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->qualification }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Qualification Status</p>
                            <span
                                class="{{ $form->provider->qualification_status === "Completed"
                                    ? "bg-green-100 text-green-700"
                                    : "bg-yellow-100 text-yellow-700" }} inline-flex rounded-full px-3 py-1 text-xs font-semibold">
                                {{ $form->provider->qualification_status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Address Info -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-lg font-semibold text-gray-900">Address Information</h2>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Present Address</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->present_address }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700">Permanent Address</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $form->provider->permanent_address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">

                <!-- Availability -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Availability</h2>
                    <span class="inline-flex rounded-lg bg-indigo-100 px-3 py-2 text-sm font-medium text-indigo-700">
                        {{ ucfirst($form->provider->availability) }}
                    </span>
                </div>

                <!-- Languages -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Languages</h2>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($form->provider->languages as $language)
                            <span class="rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">
                                {{ $language }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Submitted Documents Section -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="mb-6 text-lg font-semibold text-gray-900">Submitted Documents</h2>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">

                <!-- NID -->
                <div>
                    <p class="mb-3 text-sm font-semibold text-gray-700">National ID (NID)</p>

                    @if ($form->provider->nid_media->count())
                        <div class="flex flex-wrap gap-4">
                            @foreach ($form->provider->nid_media as $media)
                                <div class="group relative w-40 overflow-hidden rounded-xl border">
                                    <img src="{{ asset($media->path) }}" class="h-28 w-full object-cover">

                                    <button wire:click="downloadNidMedia({{ $media->id }})" type="button"
                                        class="absolute inset-0 flex items-center justify-center bg-black/60 text-sm font-medium text-white opacity-0 transition group-hover:opacity-100">
                                        Download
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No NID documents submitted</p>
                    @endif
                </div>

                <!-- License -->
                <div>
                    <p class="mb-3 text-sm font-semibold text-gray-700">Professional License</p>

                    @if ($form->provider->licenseMedia)
                        <div class="group relative w-48 overflow-hidden rounded-xl border">
                            <img src="{{ asset($form->provider->licenseMedia->path) }}"
                                class="h-40 w-full object-cover">

                            <button wire:click="downloadSingleMedia({{ $form->provider->licenseMedia->id }})"
                                class="absolute inset-0 flex items-center justify-center bg-black/60 text-sm font-medium text-white opacity-0 transition group-hover:opacity-100">
                                Download
                            </button>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Not submitted</p>
                    @endif
                </div>

                <!-- Training -->
                <div>
                    <p class="mb-3 text-sm font-semibold text-gray-700">Training Certificate</p>

                    @if ($form->provider->trainingMedia)
                        <div class="group relative w-48 overflow-hidden rounded-xl border">
                            <img src="{{ asset($form->provider->trainingMedia->path) }}"
                                class="h-40 w-full object-cover">

                            <button wire:click="downloadSingleMedia({{ $form->provider->trainingMedia->id }})"
                                class="absolute inset-0 flex items-center justify-center bg-black/60 text-sm font-medium text-white opacity-0 transition group-hover:opacity-100">
                                Download
                            </button>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Not submitted</p>
                    @endif
                </div>

                <!-- Police -->
                <div>
                    <p class="mb-3 text-sm font-semibold text-gray-700">Police Clearance</p>

                    @if ($form->provider->policeMedia)
                        <div class="group relative w-48 overflow-hidden rounded-xl border">
                            <img src="{{ asset($form->provider->policeMedia->path) }}"
                                class="h-40 w-full object-cover">

                            <button wire:click="downloadSingleMedia({{ $form->provider->policeMedia->id }})"
                                class="absolute inset-0 flex items-center justify-center bg-black/60 text-sm font-medium text-white opacity-0 transition group-hover:opacity-100">
                                Download
                            </button>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Not submitted</p>
                    @endif
                </div>

            </div>
        </div>

    </div>

</div>
