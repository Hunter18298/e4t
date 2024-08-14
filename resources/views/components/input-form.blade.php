@props(['icon', 'name', 'placeholder', 'wire', 'type' => 'text', 'maxlength' => null])

<div class="relative mt-5 w-full">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <img src="{{ asset($icon) }}" alt="{{ $name }} icon" class="w-5 h-5" />
    </div>
    <input wire:model.lazy="{{ $wire }}" type="{{ $type }}" id="{{ $name }}"
        name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="{{ $placeholder }}" value="{{ $name }}" maxlength="{{ $maxlength }}" required />
</div>
