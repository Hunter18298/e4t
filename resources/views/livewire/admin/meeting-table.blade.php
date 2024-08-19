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

    <div>
        <ul class="tabs">
            <li class="tab tab-lifted"><a wire:click="setTab('unpaid')"
                    class="{{ $tab === 'unpaid' ? 'tab-active' : '' }}">Unpaid</a></li>
            <li class="tab tab-lifted"><a wire:click="setTab('paid')"
                    class="{{ $tab === 'paid' ? 'tab-active' : '' }}">Paid</a></li>
        </ul>
    </div>

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
                @forelse ($meetings as $meeting)
                    <tr wire:key="{{ $meeting->id }}">
                        <td class="border px-4 py-2">{{ $meeting->id }}</td>
                        <td class="border px-4 py-2">{{ $meeting->userData['name'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $meeting->userData['phone'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $meeting->social->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $meeting->certificate->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $meeting->userData['address'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $meeting->content->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            {{ $meeting->paid ? 'Yes' : 'No' }}
                        </td>
                        <td class="border px-4 py-2">
                            <button type="button" class="btn btn-error btn-xs"
                                wire:click="delete({{ $meeting->id }})"
                                wire:confirm="Are you Sure you want to delete?">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center border px-4 py-2">No meetings available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>




</div>
