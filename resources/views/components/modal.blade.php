<!-- resources/views/components/modal.blade.php -->
<div x-data="{ isOpen: @entangle($attributes->wire('model')).defer }" x-show="isOpen" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
    role="dialog" aria-modal="true" style="display: none;">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div x-show="isOpen"
            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Icon slot -->
                        {{ $icon ?? '' }}
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ $title ?? 'Modal Title' }}
                        </h3>
                        <div class="mt-2">
                            <!-- Content slot -->
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <!-- Buttons slot -->
                {{ $buttons ?? '' }}
            </div>
        </div>
    </div>
</div>
