<div>
    <!-- Summary Cards -->
    <div class="grid grid-cols-2 w-full">
        <div class="grid grid-cols-2 gap-6">
            <div class="rounded-lg bg-orange-400 text-white p-5">Total Paid: ${{ $totalPaid }}</div>
            <div class="rounded-lg bg-orange-300 text-white p-5">Total Paid This Month: {{ $totalPaidThisMonth }}</div>
            <div class="rounded-lg bg-orange-300 text-white p-5">Total Participants: {{ $totalParticipants }}</div>
            <div class="rounded-lg bg-orange-300 text-white p-5">Total Participants This Month:
                {{ $totalParticipantsThisMonth }}</div>
        </div>
    </div>

    <!-- Search Input -->
    <div class="flex justify-between my-4">
        <input type="text" wire:model.debounce.300ms="searchTerm" placeholder="Search by name or phone"
            class="input" />
    </div>

    <!-- Tab Navigation -->
    <div>
        <ul class="tabs">
            <li class="tab tab-lifted">
                <a wire:click="setTab('meeting')" class="{{ $tab === 'meeting' ? 'tab-active' : '' }}">Meeting</a>
            </li>
            <li class="tab tab-lifted">
                <a wire:click="setTab('online')" class="{{ $tab === 'online' ? 'tab-active' : '' }}">Online</a>
            </li>
        </ul>
    </div>

    <!-- Table for Meeting Data -->
    @if ($tab === 'meeting')
        <div>
            <table class="table-auto w-full">
                <caption class="text-left">Meeting Data</caption>
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Social Media</th>
                        <th class="px-4 py-2">Certificate</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Course</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Paid</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acceptForms as $form)
                        @if ($form['types'] === 0)
                            <tr>
                                <td class="border px-4 py-2">{{ $form['acceptId'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['phone'] }}</td>
                                <td class="border px-4 py-2">{{ $form['SocialUse']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['Certificate']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['address'] }}</td>
                                <td class="border px-4 py-2">{{ $form['ContentType']['name'] }}</td>
                                <td class="border px-4 py-2">
                                    <button class="rounded-md px-4 py-2"
                                        style="background-color: {{ $form['ColorStatus']['color'] }}">{{ $form['ColorStatus']['name'] }}</button>
                                </td>
                                <td class="border px-4 py-2">
                                    <span
                                        class="w-3 h-3 inline-block rounded-full {{ $form['paid'] ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="openDeleteModal({{ $form['acceptId'] }})"
                                        class="px-4 py-2 bg-red-500 text-white rounded-md">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Table for Online Data -->
    @if ($tab === 'online')
        <div>
            <table class="table-auto w-full">
                <caption class="text-left">Online Data</caption>
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Social Media</th>
                        <th class="px-4 py-2">Certificate</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Course</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Paid</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acceptForms as $form)
                        @if ($form['types'] === 1)
                            <tr>
                                <td class="border px-4 py-2">{{ $form['acceptId'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['phone'] }}</td>
                                <td class="border px-4 py-2">{{ $form['SocialUse']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['Certificate']['name'] }}</td>
                                <td class="border px-4 py-2">{{ $form['userData']['address'] }}</td>
                                <td class="border px-4 py-2">{{ $form['ContentType']['name'] }}</td>
                                <td class="border px-4 py-2">
                                    <button class="rounded-md px-4 py-2"
                                        style="background-color: {{ $form['ColorStatus']['color'] }}">{{ $form['ColorStatus']['name'] }}</button>
                                </td>
                                <td class="border px-4 py-2">
                                    <span
                                        class="w-3 h-3 inline-block rounded-full {{ $form['paid'] ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="openDeleteModal({{ $form['acceptId'] }})"
                                        class="px-4 py-2 bg-red-500 text-white rounded-md">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Modal for Deletion Confirmation -->
    @if ($isDeleteModalOpen)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                <p class="mb-6">Are you sure you want to delete this entry?</p>
                <div class="flex justify-end">
                    <button wire:click="handleDelete({{ $deleteFormId }})"
                        class="px-4 py-2 bg-red-500 text-white rounded-md mr-2">Yes</button>
                    <button wire:click="closeDeleteModal"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md">No</button>
                </div>
            </div>
        </div>
    @endif
</div>
