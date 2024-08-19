<div class="container mx-auto p-4">
    <button type="button" wire:click="openModal" class="btn btn-primary">Open
        Modal</button>


    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model="search" placeholder="Search by name or phone"
            class="input input-bordered w-full max-w-xs">
        {{-- <select wire:model="content" class="select select-bordered">
            <option value="">All Contents</option>
            @foreach ($contents as $content)
                <option value="{{ $content->id }}">
                    {{ $content->name }}
                </option>
            @endforeach
        </select> --}}
    </div>
    <div x-data="{ activeTab: 'tab1' }"
        class="tab-section bg-gray-100 p-5 rounded-lg backdrop-filter backdrop-blur-lg bg-opacity-40 w-[1200px] min-h-[400px] border-2 border-indigo-200">
        <div class="flex flex-wrap gap-1">
            <button @click="activeTab = 'tab1'" :class="{ 'bg-gray-300 bg-opacity-40': activeTab === 'tab1' }"
                class="p-4 rounded-lg text-gray-700 font-bold hover:bg-gray-300 hover:bg-opacity-40 flex-grow w-80">
                Unpaid

            </button>
            <button @click="activeTab = 'tab2'" :class="{ 'bg-gray-300 bg-opacity-40': activeTab === 'tab2' }"
                class="p-4 rounded-lg font-bold hover:bg-gray-300 hover:bg-opacity-40 text-gray-700 flex-grow w-80">
                Paid
            </button>

        </div>
        <div class="mt-4">
            <div x-show="activeTab === 'tab1'" class="tab-content text-gray-700">
                <h4 class="font-bold mt-9 mb-4 text-2xl">unpaid</h4>
                <div class="pt-4">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Social Media</th>
                                <th class="px-4 py-2">Certificate</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Course</th>
                                <th class="px-4 py-2">Paid</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($onlines as $online)
                                <tr wire:key="{{ $online->id }}">
                                    <td class="border px-4 py-2">{{ $online->id }}</td>
                                    <td class="border px-4 py-2">{{ $online->userData['name'] ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $online->userData['phone'] ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $online->social->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $online->certificate->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $online->userData['address'] ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">{{ $online->content->name ?? 'N/A' }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $online->paid ? 'Yes' : 'No' }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <button type="button" class="btn btn-error btn-xs"
                                            wire:click="delete({{ $online->id }})"
                                            wire:confirm="Are you Sure you want to delete?">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center border px-4 py-2">No onlines available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show="activeTab === 'tab2'" class="tab-content text-gray-700">
                <h4 class="font-bold mt-9 mb-4 text-2xl">paid</h4>
                <!-- Insert Livewire component for Settings -->
                {{-- @livewire('settings-component') --}}
            </div>

        </div>
    </div>

    {{-- <div>
        <ul class="tabs">
            <li class="tab tab-lifted"><a wire:click="setTab('unpaid')"
                    class="{{ $tab === 'unpaid' ? 'tab-active' : '' }}">Unpaid</a></li>
            <li class="tab tab-lifted"><a wire:click="setTab('paid')"
                    class="{{ $tab === 'paid' ? 'tab-active' : '' }}">Paid</a></li>
        </ul>
    </div> --}}






</div>
