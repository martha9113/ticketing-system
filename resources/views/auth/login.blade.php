<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-shell">

    <!-- Login Card -->
    <div class="login-card">

        <!-- Heading -->
        <h1 class="login-title">
            Ticketing System
        </h1>

        <!-- Form -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="login-label">
                    Email:
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter email"
                    required
                    class="login-input"
                >
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="login-label">
                    Password:
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                    class="login-input"
                >
            </div>

            <!-- Show Password -->
            <div class="mb-8">
                <label class="flex items-center text-sm text-slate-600">
                    <input
                        type="checkbox"
                        onclick="togglePassword()"
                        class="mr-2 h-4 w-4"
                    >
                    Show Password
                </label>
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

            <!-- Footer Links -->
            <div class="text-center mt-10 text-sm">
                <p class="text-gray-600">
                    Forgot
                    <a href="#" class="login-link">
                        Username / Password?
                    </a>
                </p>

                <p class="text-gray-600 mt-2">
                    Don't have an account?
                    <a href="#" class="login-link">
                        Sign up
                    </a>
                </p>
            </div>

        </form>

    </div>

    <script>
        function togglePassword() {
            let password = document.getElementById('password');

            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
    </script>

</body>
</html>
