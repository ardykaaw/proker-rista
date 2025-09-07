<template>
    <div
        class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat relative"
        style="background-image: url('/images/background/background_login.jpg')"
    >
        <!-- Overlay untuk memastikan teks tetap terbaca -->
        <div class="absolute inset-0 bg-opacity-80"></div>

        <div
            class="max-w-md w-full space-y-6 p-10 bg-white/95 backdrop-blur-sm rounded-xl shadow-lg relative z-10"
        >
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-800">
                    Admin Login
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Sign in to access dashboard
                </p>
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
                <div class="space-y-5">
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                            >Email Address</label
                        >
                        <input
                            id="email"
                            type="email"
                            v-model="email"
                            required
                            class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="Enter your email"
                        />
                    </div>
                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700"
                            >Password</label
                        >
                        <input
                            id="password"
                            type="password"
                            v-model="password"
                            required
                            class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="Enter your password"
                        />
                    </div>
                </div>

                <div class="space-y-4">
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                    >
                        Sign in
                    </button>

                    <!-- Error Message -->
                    <div v-if="error" class="text-red-600 text-sm text-center">
                        {{ error }}
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: "",
        };
    },
    methods: {
        async handleLogin() {
            try {
                // Reset error
                this.error = "";

                await window.axios.get('/sanctum/csrf-cookie');
                await window.axios.post('/api/login', {
                    email: this.email,
                    password: this.password,
                });
                localStorage.setItem("isAdminLoggedIn", "true");
                this.$router.push("/dashboard");
            } catch (error) {
                console.error("Login failed:", error);
                this.error = (error.response && error.response.data && error.response.data.message) ? error.response.data.message : "Terjadi kesalahan saat login";
            }
        },
    },
};
</script>
