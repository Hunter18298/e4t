@props(['isOpen'])
<!-- resources/views/components/sidebar.blade.php -->
<div
    class="flex flex-col min-h-screen border-r p-4 bg-gray-800 text-white {{ $isOpen ? 'w-[300px]' : 'w-20' }} transition-all duration-300">
    <button onclick="toggleSidebar()" class="p-4 focus:outline-none">
        <i class="fas fa-bars"></i>
    </button>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin">
            @if ($isOpen)
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            @else
                <i class="fas fa-tachometer-alt"></i>
            @endif
        </a>
    </div>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin/meeting">
            @if ($isOpen)
                <i class="fas fa-users mr-2"></i> Meeting
            @else
                <i class="fas fa-users"></i>
            @endif
        </a>
    </div>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin/online">
            @if ($isOpen)
                <i class="fas fa-phone mr-2"></i> Online
            @else
                <i class="fas fa-phone"></i>
            @endif
        </a>
    </div>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin/accounting">
            @if ($isOpen)
                <i class="fas fa-bars mr-2"></i> Accounting
            @else
                <i class="fas fa-bars"></i>
            @endif
        </a>
    </div>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin/contents">
            @if ($isOpen)
                <i class="fas fa-filter-circle-xmark mr-2"></i> Contents
            @else
                <i class="fas fa-filter-circle-xmark"></i>
            @endif
        </a>
    </div>
    <div>
        <a class="block px-4 py-2 hover:bg-gray-700" href="/admin/groups">
            @if ($isOpen)
                <i class="fas fa-graduation-cap mr-2"></i> Groups
            @else
                <i class="fas fa-graduation-cap"></i>
            @endif
        </a>
    </div>
</div>
