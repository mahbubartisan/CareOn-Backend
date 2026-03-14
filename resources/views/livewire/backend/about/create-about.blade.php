<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Create About
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create About</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">About Information</h2>
        <form method="post" class="space-y-6">
            <!-- Our Story -->
            <div>
                <div wire:ignore>
                    <label for="editorOurStory" class="block text-sm text-gray-700 dark:text-gray-400 mb-2">
                        Our Story<span class="text-red-500">*</span>
                    </label>
                    <div id="editorOurStory" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.our_story" id="our_story">
                </div>
                <div class="mt-1">
                    @error("form.our_story")
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Our Mission -->
            <div>
                <div wire:ignore>
                    <label for="editorOurMission" class="block text-sm text-gray-700 dark:text-gray-400 mb-2">
                        Our Mission<span class="text-red-500">*</span>
                    </label>
                    <div id="editorOurMission" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.our_mission" id="our_mission">
                </div>
                <div class="mt-1">
                    @error("form.our_mission")
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Our Vision -->
            <div>
                <div wire:ignore>
                    <label for="editorOurVision" class="block text-sm text-gray-700 dark:text-gray-400 mb-2">
                        Our Vision<span class="text-red-500">*</span>
                    </label>
                    <div id="editorOurVision" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.our_vision" id="our_vision">
                </div>
                <div class="mt-1">
                    @error("form.our_vision")
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click='store' type="button"
                    class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quill = new Quill('#editorDesc', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                    ]
                }
            });

            // Set the initial content from Livewire (escaped properly)
            let initialContent = @json($form->detail);
            quill.root.innerHTML = initialContent ?? "";

            // Update Livewire model when Quill content changes
            quill.on('text-change', function() {
                @this.set('form.detail', quill.root.innerHTML);
            });

            Livewire.hook('message.processed', (message, component) => {
                let updatedContent = @json($form->detail);
                if (quill.root.innerHTML !== updatedContent) {
                    quill.root.innerHTML = updatedContent ?? "";
                }
            });
        });
    </script>
</div>
