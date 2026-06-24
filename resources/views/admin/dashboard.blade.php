<x-app-layout>
    <x-slot name="header">
        {{ __('Admin Dashboard') }}
    </x-slot>

    <div class="space-y-6">
        <!-- Stat Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Students -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-50"></div>
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Mahasiswa</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $totalMahasiswa ?? 0 }}</h3>
                    <p class="text-xs text-green-500 mt-2 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>Data Terbaru</span>
                    </p>
                </div>
                <div class="w-14 h-14 rounded-full bg-blue-500 text-white flex items-center justify-center relative z-10 shadow-lg shadow-blue-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
            </div>

            <!-- Card 2: Teachers -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                 <div class="absolute -right-6 -top-6 w-24 h-24 bg-orange-50 rounded-full opacity-50"></div>
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Dosen</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $totalDosen ?? 0 }}</h3>
                    <p class="text-xs text-green-500 mt-2 flex items-center">
                         <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        <span>Data Terbaru</span>
                    </p>
                </div>
                <div class="w-14 h-14 rounded-full bg-orange-500 text-white flex items-center justify-center relative z-10 shadow-lg shadow-orange-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>

            <!-- Card 3: Subjects -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-50 rounded-full opacity-50"></div>
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Mata Kuliah</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $totalMatakuliah ?? 0 }}</h3>
                    <p class="text-xs text-gray-400 mt-2 flex items-center">
                        <span>Semester Ganjil 2026</span>
                    </p>
                </div>
                <div class="w-14 h-14 rounded-full bg-red-500 text-white flex items-center justify-center relative z-10 shadow-lg shadow-red-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
            </div>

            <!-- Card 4: Classes -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                 <div class="absolute -right-6 -top-6 w-24 h-24 bg-pink-50 rounded-full opacity-50"></div>
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 mb-1">Status Sistem</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">Normal</h3>
                    <p class="text-xs text-green-500 mt-2 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Semua layanan aktif</span>
                    </p>
                </div>
                <div class="w-14 h-14 rounded-full bg-pink-600 text-white flex items-center justify-center relative z-10 shadow-lg shadow-pink-600/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Line Chart (Wide) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold text-gray-800">Jadwal Kelas per Hari</h4>
                    <button class="p-1 text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                </div>
                <div class="relative h-72 w-full">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Bar Chart (Narrow) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                 <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold text-gray-800">Mahasiswa per Dosen Wali</h4>
                    <button class="p-1 text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                </div>
                <div class="relative h-72 w-full">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Line Chart
            const ctxActivity = document.getElementById('activityChart').getContext('2d');
            new Chart(ctxActivity, {
                type: 'line',
                data: {
                    labels: {!! json_encode($hariLabels ?? []) !!},
                    datasets: [
                        {
                            label: 'Jumlah Jadwal Kelas',
                            data: {!! json_encode($jadwalData ?? []) !!},
                            borderColor: '#3b82f6', // blue-500
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', align: 'end', labels: { usePointStyle: true, boxWidth: 6 } }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [2, 2], color: '#f1f5f9' }, border: { display: false } },
                        x: { grid: { display: false }, border: { display: false } }
                    }
                }
            });

            // Bar Chart
            const ctxPerformance = document.getElementById('performanceChart').getContext('2d');
            new Chart(ctxPerformance, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dosenLabels ?? []) !!},
                    datasets: [{
                        label: 'Jumlah Mahasiswa',
                        data: {!! json_encode($dosenData ?? []) !!},
                        backgroundColor: [
                            '#10b981', // green
                            '#3b82f6', // blue
                            '#f59e0b', // yellow
                            '#ef4444', // red
                            '#6b7280'  // gray
                        ],
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [2, 2], color: '#f1f5f9' }, border: { display: false } },
                        x: { grid: { display: false }, border: { display: false } }
                    }
                }
            });
        });
    </script>
</x-app-layout>
