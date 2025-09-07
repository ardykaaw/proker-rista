<template>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <nav class="bg-white/90 backdrop-blur shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <h1 class="text-xl font-bold tracking-tight text-gray-800">Admin Dashboard</h1>
                        </div>
                        <div class="flex items-center">
                            <button
                                @click="handleLogout"
                                class="px-4 py-2 text-sm text-white bg-red-500 hover:bg-red-600 rounded-md shadow"
                            >
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
                <div class="px-4 sm:px-0 space-y-8">
                    <h2 class="text-2xl font-bold mb-2">Welcome back, Admin</h2>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Total Users</p>
                                    <p class="text-3xl font-extrabold text-gray-900">1,234</p>
                                </div>
                                <span class="h-12 w-12 inline-flex items-center justify-center rounded-full bg-blue-50 text-blue-600">
                                    <i class="fa-solid fa-users"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-xs text-green-600">+4.2% from last week</p>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Total Orders</p>
                                    <p class="text-3xl font-extrabold text-gray-900">856</p>
                                </div>
                                <span class="h-12 w-12 inline-flex items-center justify-center rounded-full bg-green-50 text-green-600">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-xs text-green-600">+1.1% from last week</p>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Revenue</p>
                                    <p class="text-3xl font-extrabold text-gray-900">$12,345</p>
                                </div>
                                <span class="h-12 w-12 inline-flex items-center justify-center rounded-full bg-purple-50 text-purple-600">
                                    <i class="fa-solid fa-sack-dollar"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-xs text-red-600">-0.7% from last week</p>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Conversion</p>
                                    <p class="text-3xl font-extrabold text-gray-900">3.8%</p>
                                </div>
                                <span class="h-12 w-12 inline-flex items-center justify-center rounded-full bg-orange-50 text-orange-600">
                                    <i class="fa-solid fa-chart-line"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-xs text-green-600">+0.3% from last week</p>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Monthly Revenue</h3>
                            </div>
                            <canvas id="revenueChart" style="height: 280px;"></canvas>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Orders by Category</h3>
                            </div>
                            <canvas id="ordersChart" style="height: 280px;"></canvas>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                            <button class="text-sm text-blue-600 hover:underline">View all</button>
                        </div>
                        <div class="divide-y divide-gray-100">
                            <div
                                v-for="(activity, index) in recentActivities"
                                :key="index"
                                class="flex items-center py-4"
                            >
                                <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center mr-4">
                                    <i class="fa-solid fa-bell text-gray-500"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ activity.title }}</p>
                                    <p class="text-xs text-gray-500">{{ activity.time }}</p>
                                </div>
                                <span :class="activity.statusColor" class="px-3 py-1 rounded-full text-xs">{{ activity.status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import Sidebar from "./Sidebar.vue";

export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            recentActivities: [
                {
                    title: "New order received",
                    time: "5 minutes ago",
                    status: "Pending",
                    statusColor: "bg-yellow-100 text-yellow-800",
                },
                {
                    title: "Payment confirmed",
                    time: "2 hours ago",
                    status: "Completed",
                    statusColor: "bg-green-100 text-green-800",
                },
                {
                    title: "New user registration",
                    time: "4 hours ago",
                    status: "New",
                    statusColor: "bg-blue-100 text-blue-800",
                },
            ],
            revenueChartInstance: null,
            ordersChartInstance: null,
        };
    },
    created() {
        // Check if admin is logged in
        if (!localStorage.getItem("isAdminLoggedIn")) {
            this.$router.push("/login");
        }
    },
    mounted() {
        this.initializeCharts();
    },
    beforeUnmount() {
        if (this.revenueChartInstance) this.revenueChartInstance.destroy();
        if (this.ordersChartInstance) this.ordersChartInstance.destroy();
    },
    methods: {
        handleLogout() {
            // Clear admin session
            window.axios.post('/api/logout').finally(() => {
                localStorage.removeItem("isAdminLoggedIn");
                this.$router.push("/login");
            });
        },
        initializeCharts() {
            const revenueCanvas = document.getElementById('revenueChart');
            const ordersCanvas = document.getElementById('ordersChart');

            if (revenueCanvas && window.Chart) {
                const revenueCtx = revenueCanvas.getContext('2d');
                this.revenueChartInstance = new window.Chart(revenueCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Revenue ($)',
                            data: [1200, 1350, 1280, 1600, 1550, 1700, 1900, 2100, 2050, 2200, 2400, 2600],
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.15)',
                            tension: 0.35,
                            fill: true,
                            pointRadius: 3
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true },
                            tooltip: { mode: 'index', intersect: false }
                        },
                        scales: {
                            y: { beginAtZero: false, grid: { color: '#f1f5f9' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }

            if (ordersCanvas && window.Chart) {
                const ordersCtx = ordersCanvas.getContext('2d');
                this.ordersChartInstance = new window.Chart(ordersCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Food', 'Travel', 'Crafts', 'Services', 'Others'],
                        datasets: [{
                            label: 'Orders',
                            data: [320, 210, 180, 260, 90],
                            backgroundColor: [
                                'rgba(16, 185, 129, 0.7)',
                                'rgba(59, 130, 246, 0.7)',
                                'rgba(139, 92, 246, 0.7)',
                                'rgba(251, 146, 60, 0.7)',
                                'rgba(107, 114, 128, 0.7)'
                            ],
                            borderRadius: 6,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }
        }
    },
};
</script>
