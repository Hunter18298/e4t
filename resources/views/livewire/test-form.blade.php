<div>
    @if ($isSubmited)
        <div>
            Done
        </div>
    @endif

    <form wire:submit.prevent="submitForm" class="max-w-md w-full bg-black">
        @csrf
        <div class="relative mt-5 w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <img src="{{ asset('/person.svg') }}" alt="phone icon" class="w-5 h-5" />
            </div>
            <input wire:model.lazy="userData.name" type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="ناوی سیانی" required />
        </div>
        <div class="relative mt-5 w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <img src="{{ asset('/phone.svg') }}" alt="phone icon" class="w-5 h-5" />
            </div>
            <input wire:model.lazy="userData.phone" type="text" id="phone" name="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="ژمارەی مۆبایل" required />
        </div>



        <div class="mt-5">

            <select wire:model="contentId" id="contentId"
                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-150">
                <option class="text-gray-500" value="">Select Content Type</option>
                @foreach ($contentTypes as $contentType)
                    <option class="text-gray-500" value="{{ $contentType->id }}">{{ $contentType->amount }}$
                        {{ $contentType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-5">

            <select wire:model="certificateId" id="certificateId"
                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-150">
                <option class="text-gray-500" value="">Select Certificate</option>
                @foreach ($certificates as $certificate)
                    <option class="text-gray-500" value="{{ $certificate->id }}">{{ $certificate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-5">
            <select wire:model="socialId" id="socialId"
                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-150">
                <option value="" class="text-gray-500">Select Social Use</option>
                @foreach ($socialUses as $socialUse)
                    <option value="{{ $socialUse->id }}" class="text-gray-700">{{ $socialUse->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>

        @if (session()->has('message'))
            <div class="mt-4 bg-green-200 text-green-700 p-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 bg-red-200 text-red-700 p-4 rounded">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
