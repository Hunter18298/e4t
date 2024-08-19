 <div class="min-h-screen bg-gray-100 p-6">
     {{-- <header class="flex justify-between items-center py-4">
         <h1 class="text-2xl font-bold text-gray-700">Dashboard</h1>
         <nav>
             <ul class="flex space-x-4">
                 <li><a href="#home" class="text-gray-600 hover:text-gray-800">Home</a></li>
                 <li><a href="#reports" class="text-gray-600 hover:text-gray-800">Reports</a></li>
                 <li><a href="#settings" class="text-gray-600 hover:text-gray-800">Settings</a></li>
             </ul>
         </nav>
     </header>

     <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
             <div class="rounded-lg bg-blue-500 text-white p-5">
                 <h2 class="text-lg font-semibold">Total Paid</h2>
                 <p class="text-2xl">${{ $totalPaid }}</p>
             </div>
             <div class="rounded-lg bg-green-500 text-white p-5">
                 <h2 class="text-lg font-semibold">Total Paid This Month</h2>
                 <p class="text-2xl">{{ $totalPaidThisMonth }}</p>
             </div>
             <div class="rounded-lg bg-yellow-500 text-white p-5">
                 <h2 class="text-lg font-semibold">Total Participants</h2>
                 <p class="text-2xl">{{ $totalParticipants }}</p>
             </div>
             <div class="rounded-lg bg-purple-500 text-white p-5">
                 <h2 class="text-lg font-semibold">Total Participants This Month</h2>
                 <p class="text-2xl">{{ $totalParticipantsThisMonth }}</p>
             </div>
         </div>
         <div class="w-full p-5 bg-white rounded-lg shadow">
             <canvas id="coursesOverviewChart"></canvas>
         </div>
     </div>

     <div class="my-6">
         <form method="GET" action="{{ url('/admin') }}">
             <div class="flex justify-between items-center mb-4">
                 <input type="text" name="search" placeholder="Search by name or phone"
                     value="{{ request('search') }}" oninput="this.form.submit()"
                     class="input input-bordered w-full max-w-xs" />

                 <select name="content_filter" onchange="this.form.submit()"
                     class="select select-bordered w-full max-w-xs">
                     <option value="">All Contents</option>
                     @foreach ($contentTypes as $contentType)
                         <option value="{{ $contentType->id }}"
                             {{ request('content_filter') == $contentType->id ? 'selected' : '' }}>
                             {{ $contentType->name }}
                         </option>
                     @endforeach
                 </select>
             </div>
         </form>

         <div x-data="{ selectedTab: 'meeting' }">
             <div class="tabs mb-4">
                 <button @click="selectedTab = 'meeting'" :class="{ 'tab-active': selectedTab === 'meeting' }"
                     class="tab tab-bordered">
                     Meeting
                 </button>
                 <button @click="selectedTab = 'online'" :class="{ 'tab-active': selectedTab === 'online' }"
                     class="tab tab-bordered">
                     Online
                 </button>
             </div>

             <div x-show="selectedTab === 'meeting'">
                 <table class="table-auto w-full">
                     <caption class="caption-top">Meeting Data</caption>
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Phone</th>
                             <th>Social Media</th>
                             <th>Certificate</th>
                             <th>Address</th>
                             <th>Course</th>
                             <th>Paid</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($filteredForms->where('types', 0) as $form)
                             <tr>
                                 <td>{{ $form->acceptId }}</td>
                                 <td>{{ $form->userData->name }}</td>
                                 <td>{{ $form->userData->phone }}</td>
                                 <td>{{ $form->userData->whatsapp }}</td>
                                 <td>{{ $form->userData->certificate }}</td>
                                 <td>{{ $form->userData->address }}</td>
                                 <td>{{ $form->userData->course }}</td>
                                 <td>
                                     <span
                                         class="inline-block w-3 h-3 rounded-full {{ $form->paid ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                     {{ $form->paid ? ' Yes' : ' No' }}
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>

             <div x-show="selectedTab === 'online'">
                 <table class="table-auto w-full">
                     <caption class="caption-top">Online Data</caption>
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Phone</th>
                             <th>Social Media</th>
                             <th>Certificate</th>
                             <th>Address</th>
                             <th>Course</th>
                             <th>Paid</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($filteredForms->where('types', 1) as $form)
                             <tr>
                                 <td>{{ $form->acceptId }}</td>
                                 <td>{{ $form->userData->name }}</td>
                                 <td>{{ $form->userData->phone }}</td>
                                 <td>{{ $form->userData->whatsapp }}</td>
                                 <td>{{ $form->userData->certificate }}</td>
                                 <td>{{ $form->userData->address }}</td>
                                 <td>{{ $form->userData->course }}</td>
                                 <td>
                                     <span
                                         class="inline-block w-3 h-3 rounded-full {{ $form->paid ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                     {{ $form->paid ? ' Yes' : ' No' }}
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/alpinejs"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
     const ctx = document.getElementById('coursesOverviewChart').getContext('2d');
     const chart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: {!! json_encode($months) !!},
             datasets: [{
                     label: 'Courses Paid',
                     data: {!! json_encode($coursesPaidData) !!},
                     backgroundColor: 'rgba(255, 99, 132, 0.2)',
                     borderColor: 'rgba(255, 99, 132, 1)',
                     borderWidth: 1,
                 },
                 {
                     label: 'Courses This Month',
                     data: {!! json_encode($coursesThisMonthData) !!},
                     backgroundColor: 'rgba(54, 162, 235, 0.2)',
                     borderColor: 'rgba(54, 162, 235, 1)',
                     borderWidth: 1,
                 }
             ]
         },
         options: {
             responsive: true,
             plugins: {
                 legend: {
                     position: 'top',
                 },
                 title: {
                     display: true,
                     text: 'Courses Overview'
                 }
             }
         }
     });
 </script> --}}

 </div>
