<html>

<head>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen">
    <div class="bg-white shadow-2xl rounded-lg p-8 w-full max-w-sm">
        <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h3>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <input type="email" id="email"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10"
                        placeholder="Enter your email">
                    <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10"
                        placeholder="Enter your password">
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition duration-300">Login</button>
        </form>
        <div class="text-center mt-6">
            <p class="text-gray-700">Don't have an account?<a href="#" class="text-blue-500 hover:underline">Sign
                    up</a></p>
        </div>
    </div>
</body>

</html>