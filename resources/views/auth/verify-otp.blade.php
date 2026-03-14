@extends("auth.app")
@section("title")
    CareOn - OTP Verification
@endsection

@section("content")
    {{-- <div class="flex min-h-screen items-center justify-center">
        <form method="POST" action="{{ route("otp.verify", $user->id) }}"
            class="mx-auto mt-16 max-w-lg space-y-4 border border-gray-200 rounded-lg bg-white p-6 shadow-sm">
            @csrf

            <h2 class="text-center text-lg font-semibold">
                Verify Your Phone Number
            </h2>

            <p class="text-center text-sm text-gray-500">
                We sent a 6-digit code to {{ $user->phone }}
            </p>

            <div>
                <input type="number" name="otp" maxlength="6"
                    class="mb-1 w-full rounded-xl border border-gray-200 px-3 py-2 text-center text-base tracking-widest focus:border-teal-200 focus:outline-none"
                    placeholder="Enter OTP">

                @error("otp")
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full rounded bg-teal-600 py-2 text-white hover:bg-teal-700">
                Verify
            </button>
        </form>
    </div> --}}
    <div class="flex min-h-screen items-center justify-center px-4">

        <div class="w-full max-w-md rounded-2xl border border-gray-200 bg-white p-8">

            <!-- Icon -->
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-100">
                <svg class="h-7 w-7 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                    <path d="m9 12 2 2 4-4" />
                </svg>
            </div>

            <!-- Heading -->
            <h2 class="mt-6 text-center text-2xl font-semibold text-gray-800">
                Verify Your Identityy
            </h2>

            <!-- Sub text -->
            <p class="mt-2 text-center text-sm text-gray-500">
                We’ve sent a 6-digit verification code to <span class="font-bold text-gray-800">{{ $user->phone }}</span> <br>
                Please enter it below to continue.
            </p>

            <!-- OTP Form -->
            <form method="POST" action="{{ route("otp.verify", $user->id) }}" x-data="{ loading: false }"
                @submit="loading = true" class="mt-8 space-y-6">

                @csrf
                <!-- OTP Inputs -->
                {{-- <div class="flex justify-center gap-3">
                    <template x-for="i in 6">
                        <input type="text" maxlength="1" inputmode="numeric"
                            class="h-12 w-12 rounded-xl border border-gray-300 text-center text-lg font-semibold focus:border-emerald-500 focus:outline-none"
                            required>
                    </template>
                </div> --}}
                <div x-data="{ otp: ['', '', '', '', '', ''] }">

                    <!-- OTP Inputs -->
                    <div class="flex justify-center gap-3">
                        <template x-for="(digit, index) in otp" :key="index">
                            <input type="text" inputmode="numeric" maxlength="1"
                                class="h-12 w-12 rounded-xl border border-gray-300 text-center text-lg font-semibold focus:border-emerald-500 focus:outline-none"
                                x-model="otp[index]"
                                @input="
                                    if ($event.target.value.length === 1 && index < 5) {
                                        $event.target.nextElementSibling.focus()
                                    }
                                ">
                        </template>
                    </div>

                    <!-- Combined OTP value -->
                    <input type="hidden" name="otp" :value="otp.join('')">

                    <!-- Validation error (exactly below inputs) -->
                    @error("otp")
                        <p class="mt-2 text-center text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Verify Button -->
                <button type="submit" :disabled="loading"
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 py-3 text-sm font-medium text-white hover:bg-emerald-500 disabled:opacity-60">
                    <svg x-show="loading" class="h-4 w-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 12a9 9 0 1 1-6.219-8.56" />
                    </svg>

                    <span x-show="!loading">Verify Code</span>
                    <span x-show="loading">Verifying...</span>
                </button>

                <!-- Resend -->
                {{-- <p class="text-center text-sm text-gray-500">
                    Didn’t receive the code?
                    <button type="button" class="font-medium text-emerald-600 hover:underline">
                        Resend OTP
                    </button>
                </p> --}}

            </form>

            <!-- Footer note -->
            <p class="mt-6 text-center text-xs text-gray-400">
                This helps us keep your account secure.
            </p>
        </div>
    </div>
@endsection
